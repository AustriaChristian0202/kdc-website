<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\StatusChange;
use App\Models\Appointment as ModelsAppointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;


class Appointment extends Controller
{
  //
  public function index(Request $request)
  {

    $request->validate([
      'search' => 'nullable|string|max:255',
      'page' => 'nullable|integer',
      'status' => 'nullable|in:pending,approved,rejected',
      'end_date' => 'nullable|date',
      'start_date' => 'nullable|date',
      'service' => 'nullable|string',
    ]);


    $appointments = ModelsAppointment::with(['dentist', 'client'])
      ->when($request->search, function ($query, $search) {
        // group the where clause
        $query->where(function ($query) use ($search) {
          $query->where('name', 'like', "%$search%");
        });
      })
      ->when($request->service, function ($query, $service) {
        $query->where('service', $service);
      })
      // search by dentist name 
      ->when($request->search, function ($query, $search) {
        // group the where clause
        $query->orWhereHas('dentist', function ($query) use ($search) {
          $query->where('name', 'like', "%$search%");
        });
      })
      ->when($request->status, function ($query, $status) {
        return $query->where('status', $status);
      })
      ->when($request->start_date, function ($query, $start_date) {
        return $query->whereDate('schedule', '>=', $start_date);
      })
      ->when($request->end_date, function ($query, $end_date) {
        return $query->whereDate('schedule', '<=', $end_date);
      })
      ->orderBy('created_at', 'desc')
      ->paginate(10)->appends($request->all());



    return Inertia::render('Admin/Appointment/Index', [
      'filters' => $request->all(),
      'appointments' => $appointments,
    ]);
  }

  public function statusChange(Request $request)
  {
    $request->validate([
      'id' => 'required|exists:appointments,id',
      'status' => 'required|in:pending,approved,rejected',
    ]);

    $appointment = ModelsAppointment::find($request->id);
    $appointment->status = $request->status;
    $appointment->save();

    $user = User::find($appointment->user_id);

    Mail::to($user->email)->send(
      new StatusChange(
        $user->email,
        $user->name,
        $appointment->schedule,
        $appointment->service,
        $appointment->dentist->name,
        $appointment->status
      )
    );

    return redirect()->back()->with([
      'message' => [
        'type' => 'success',
        'content' => 'Appointment status changed successfully',
      ]
    ]);
  }

  public function appointmentsByDate($date = null)
  {
    $date = $date ?? date('Y-m-d');
    $appointments = ModelsAppointment::where('status', 'approved')->whereDate('schedule', $date)
      ->with('dentist')->get();

    return response()->json($appointments);
  }

  public function store(Request $request)
  {
    //
    $request->validate([
      'name' => 'required|string|max:255',
      'age' => 'required|integer',
      'sex' => 'required|in:male,female',
      // date is greater than today
      'date' => 'required|date|after_or_equal:today',
      'service' => 'required',
      'dentist' => 'required|exists:users,id',
      'contact' => 'required|digits:11',
      'time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:17:00',
    ]);


    // combine date and time
    $schedule = $request->date . ' ' . $request->time;

    // check if appointment date is already taken
    $appointment = ModelsAppointment::where('schedule', $schedule)->first();
    if ($appointment) {
      return redirect()->back()->with([
        'message' => [
          'type' => 'error',
          'content' => 'Appointment date is already taken',
        ]
      ]);
    }

    $newAppointment = new ModelsAppointment();
    $newAppointment->name = $request->name;
    $newAppointment->age = $request->age;
    $newAppointment->sex = $request->sex;
    $newAppointment->service = $request->service;
    $newAppointment->schedule = $schedule;
    $newAppointment->dentist_id = $request->dentist;
    $newAppointment->created_by = Auth::user()->id;
    $newAppointment->contact = $request->contact;
    $newAppointment->save();


    return to_route('admin.appointment.index')->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Appointment created successfully'
        ],
      ]
    );
  }

  public function create()
  {
    //
    $dentists = User::where('role', 'admin')->get([
      'name', 'id'
    ]);

    // get today appointment
    $today = ModelsAppointment::where('user_id', Auth::user()->id)->whereDate('schedule', today()->format(
      'Y-m-d'
    ))->with('dentist')->first();


    return Inertia::render('Admin/Appointment/Create', [
      'dentists' => $dentists,
      'today' => $today,
    ]);
  }

  public function rescheduleForm($appointment_id)
  {
    $appointment = ModelsAppointment::find($appointment_id);
    $dentists = User::where('role', 'admin')->get([
      'name', 'id'
    ]);

    return Inertia::render('Admin/Appointment/Resched', [
      'appointment' => $appointment,
      'dentists' => $dentists,
    ]);
  }

  public function reschedule($appointment_id, Request $request)
  {
    //
    $request->validate([
      'name' => 'required|string|max:255',
      'age' => 'required|integer',
      'sex' => 'required|in:male,female',
      // date is greater than today
      'date' => 'required|date|after_or_equal:today',
      'service' => 'required',
      'dentist' => 'required|exists:users,id',
      'contact' => 'required|digits:11',
      'time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:17:00',
    ]);

    // combine date and time
    $schedule = $request->date . ' ' . $request->time;

    $appointment = ModelsAppointment::find($appointment_id);

    $appointment->name = $request->name;
    $appointment->age = $request->age;
    $appointment->sex = $request->sex;
    $appointment->schedule = $schedule;
    $appointment->service = $request->service;
    $appointment->dentist_id = $request->dentist;
    $appointment->created_by = Auth::user()->id;
    $appointment->contact = $request->contact;
    $appointment->status = 'rescheduled';

    $appointment->save();


    // email the client

    $user = User::find($appointment->user_id);

    Mail::to($user->email)->send(
      new StatusChange(
        $user->email,
        $user->name,
        $appointment->schedule,
        $appointment->service,
        $appointment->dentist->name,
        $appointment->status
      )
    );


    return redirect()->route('admin.appointment.index')->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Appointment rescheduled successfully'
        ],
      ]
    );
  }
}

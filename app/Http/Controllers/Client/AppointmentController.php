<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\cr;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AppointmentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $dentists = User::where('role', 'admin')->get([
      'name', 'id'
    ]);

    // get today appointment
    $today = Appointment::where('user_id', Auth::user()->id)->whereDate('schedule', today()->format(
      'Y-m-d'
    ))->with('dentist')->first();


    return Inertia::render('Client/Appointment/Index', [
      'dentists' => $dentists,
      'today' => $today,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
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
      'contact' => 'required|integer|digits:11',
      'time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:17:00',
    ]);

    // combine date and time
    $schedule = $request->date . ' ' . $request->time;

    $appointment = Appointment::create([
      'name' => $request->name,
      'age' => $request->age,
      'sex' => $request->sex,
      'schedule' => $schedule,
      'service' => $request->service,
      'dentist_id' => $request->dentist,
      'user_id' => auth()->user()->id,
      'created_by' => auth()->user()->id,
      'contact' => $request->contact,
    ]);


    return redirect()->back()->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Appointment created successfully'
        ],
      ]
    );
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\cr  $cr
   * @return \Illuminate\Http\Response
   */
  public function show(Appointment $cr)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\cr  $cr
   * @return \Illuminate\Http\Response
   */
  public function edit(Appointment $cr)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\cr  $cr
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Appointment $cr)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\cr  $cr
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // cancel appointment
    $appointment = Appointment::find($id);

    // remove time in sched
    $sched = Carbon::parse($appointment->schedule)->format('Y-m-d');
    $today = Carbon::today()->format('Y-m-d');

    // if sched is today or tomorrow cannot be cancelled
    if ($sched == $today || $sched == Carbon::tomorrow()->format('Y-m-d')) {
      return redirect()->back()->with(
        [
          'message' => [
            'type' => 'error',
            'content' => 'You cannot cancel appointment today or tomorrow'
          ],
        ]
      );
    }


    $appointment->status = 'cancelled';
    $appointment->save();

    return redirect()->back()->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Appointment cancelled successfully'
        ],
      ]
    );
  }

  public function myAppointments()
  {
    $appointments = Appointment::where('user_id', auth()->user()->id)
      ->with('dentist')
      ->latest()
      ->get()
      // map to check date if today or tomorrow if true add cancellable to true
      ->map(function ($appointment) {
        $sched = Carbon::parse($appointment->schedule)->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');

        if ($sched == $today || $sched == Carbon::tomorrow()->format('Y-m-d')) {
          $appointment->cancellable = false;
        } else {
          $appointment->cancellable = true;
        }

        return $appointment;
      });

    return Inertia::render('Client/MyAppointments/Index', [
      'appointments' => $appointments,
    ]);
  }

  public function getSelectedDateAppointment($date)
  {
    $appointment = Appointment::whereDate('schedule', $date)
      ->get(['schedule'])
      ->each(function ($appointment) {
        // get only time of schedule
        $appointment->schedule = Carbon::parse($appointment->schedule)->format('H:i');
      });


    return response()->json($appointment);
  }

  public function rescheduleForm($appointment_id)
  {
    $appointment = Appointment::find($appointment_id);

    $dentists = User::where('role', 'admin')->get([
      'name', 'id'
    ]);

    return Inertia::render('Client/MyAppointments/Reschedule', [
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
      'contact' => 'required|integer|digits:11',
      'time' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:17:00',
    ]);

    // combine date and time
    $schedule = $request->date . ' ' . $request->time;

    $appointment = Appointment::find($appointment_id);

    $appointment->name = $request->name;
    $appointment->age = $request->age;
    $appointment->sex = $request->sex;
    $appointment->schedule = $schedule;
    $appointment->service = $request->service;
    $appointment->dentist_id = $request->dentist;
    $appointment->contact = $request->contact;
    $appointment->status = 'rescheduled';

    $appointment->save();


    return redirect()->route('client.my-appointments')->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Appointment rescheduled successfully'
        ],
      ]
    );
  }
}

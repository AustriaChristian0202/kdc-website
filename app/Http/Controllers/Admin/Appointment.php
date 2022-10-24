<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment as ModelsAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    ]);


    $appointments = ModelsAppointment::with(['dentist', 'client'])
      ->when($request->search, function ($query, $search) {
        // group the where clause
        $query->where(function ($query) use ($search) {
          $query->where('name', 'like', "%$search%")
            ->orWhere('age', 'like', "%$search%")
            ->orWhere('contact', 'like', "%$search%")
            ->orWhere('service', 'like', "%$search%")
            ->orWhere('schedule', 'like', "%$search%");
        });
      })
      ->when($request->status, function ($query, $status) {
        return $query->where('status', $status);
      })
      ->orderBy('created_at', 'desc')
      ->paginate(10)->appends($request->all());



    return Inertia::render('Admin/Appointment/Index', [
      'filters' => $request->all('search', 'page', 'status'),
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
    $appointments = ModelsAppointment::whereDate('schedule', $date)
      ->with('dentist')->get();

    return response()->json($appointments);
  }

  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required|string|max:255',
      'age' => 'required|integer',
      'contact' => 'required|string|max:255',
      'service' => 'required|string|max:255',
      'date' => 'required|date',
    ]);

    $appointment = new ModelsAppointment();
    $appointment->name = $request->name;
    $appointment->age = $request->age;
    $appointment->contact = $request->contact;
    $appointment->service = $request->service;
    $appointment->schedule = $request->date;
    $appointment->dentist_id = Auth::user()->id;
    $appointment->created_by = Auth::user()->id;
    $appointment->save();

    return redirect()->back()->with([
      'message' => [
        'type' => 'success',
        'content' => 'Appointment created successfully',
      ]
    ]);
  }
}

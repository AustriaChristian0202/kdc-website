<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AppointmentExport;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportController extends Controller
{
  //
  public function appointment(Request $request)
  {

    $request->validate([
      'start_date' => 'nullable|date',
      'end_date' => 'nullable|date',
      'search' => 'nullable|string',
      'dentist_id' => 'nullable|integer',
      'status' => 'nullable|string|in:pending,approved,rejected,cancelled',
      'sort' => 'nullable|string|in:asc,desc',
      'sort_by' => 'nullable|string|in:created_at,updated_at',
      'page' => 'nullable|integer',
      'service' => 'nullable|string',
    ]);

    $appointment =
      $this->fetchAppointment($request)
      ->paginate(10)
      ->appends($request->query());


    return Inertia::render('Admin/Report/Appointment/Index', [
      'appointments' => $appointment,
      'filters' => $request->all(['search', 'start_date', 'end_date', 'dentist_id', 'status', 'sort', 'sort_by', 'service']),
    ]);
  }

  public function fetchAppointment(Request $request)
  {
    return  Appointment::with(['dentist', 'client', 'causer'])->when($request->start_date, function ($query) use ($request) {
      return $query->whereDate('schedule', '>=', $request->start_date);
    })
      ->when($request->end_date, function ($query) use ($request) {
        return $query->whereDate('schedule', '<=', $request->end_date);
      })
      ->when($request->search, function ($query) use ($request) {
        return $query->where('name', 'like', '%' . $request->search . '%');
      })
      ->when($request->dentist_id, function ($query) use ($request) {
        return $query->where('dentist_id', $request->dentist_id);
      })
      ->when($request->status, function ($query) use ($request) {
        return $query->where('status', $request->status);
      })
      ->when($request->service, function ($query) use ($request) {
        return $query->where('service', $request->service);
      })
      ->when($request->sort_by, function ($query) use ($request) {
        return $query->orderBy($request->sort_by, $request->sort ?? 'asc');
      })
      ->latest('schedule');
  }

  public function appointmentExport(Request $request)
  {
    $request->validate([
      'start_date' => 'nullable|date',
      'end_date' => 'nullable|date',
      'search' => 'nullable|string',
      'dentist_id' => 'nullable|integer',
      'status' => 'nullable|string|in:pending,approved,rejected,cancelled',
      'sort' => 'nullable|string|in:asc,desc',
      'sort_by' => 'nullable|string|in:created_at,updated_at',
      'page' => 'nullable|integer',
      'service' => 'nullable|string',
    ]);

    $name = 'appointment-' . date('Y-m-d') . '.xlsx';

    return (new AppointmentExport(
      $this->fetchAppointment($request)
        ->get()
    ))
      ->download($name);
  }
}

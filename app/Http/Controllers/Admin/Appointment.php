<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment as ModelsAppointment;
use Illuminate\Http\Request;
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
}

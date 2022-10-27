<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
  //
  public function index()
  {

    $today = Appointment::whereDate('schedule', today()->format(
      'Y-m-d'
    ));
    // get all todays appointment
    $todaysAppointment = $today->count();
    $remainingAppointments = Appointment::where('status', 'pending')->count();
    // date time is greater than today include time
    $upcomingAppointments =
      $today->whereTime('schedule', '>', today()->format(
        'H:i:s'
      ))->first();
    return Inertia::render('Admin/Home/Index', [
      'todaysAppointment' => $todaysAppointment,
      'remainingAppointments' => $remainingAppointments,
      'nextAppointment' => $upcomingAppointments,
    ]);
  }
}

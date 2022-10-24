<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\cr;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
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


    return Inertia::render('Client/Appointment/Index', [

      'dentists' => $dentists,

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
      'date' => 'required|date',
      'service' => 'required',
      'dentist' => 'required|exists:users,id',
      'contact' => 'required|string|max:255',
    ]);

    $appointment = Appointment::create([
      'name' => $request->name,
      'age' => $request->age,
      'sex' => $request->date,
      'schedule' => $request->date,
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
  public function destroy(Appointment $cr)
  {
    //
  }

  public function myAppointments()
  {
    $appointments = Appointment::where('user_id', auth()->user()->id)->get();

    return Inertia::render('Client/MyAppointments/Index', [
      'appointments' => $appointments,
    ]);
  }
}

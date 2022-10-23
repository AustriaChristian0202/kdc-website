<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\cr;
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
    return Inertia::render('Client/Appointment/Index', []);
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
      'name' => 'required',
      'age' => 'required|integer',
      'sex' => 'required|in:male,female',
      'date' => 'required',
      'service' => 'required',
      'dentist' => 'required',
    ]);

    $appointment = Appointment::create([
      'name' => $request->name,
      'age' => $request->age,
      'sex' => $request->date,
      'date' => $request->date,
      'service' => $request->service,
      'dentist' => $request->dentist,
      'user_id' => auth()->user()->id,
    ]);

    return redirect()->route('client.appointment.index');
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
}

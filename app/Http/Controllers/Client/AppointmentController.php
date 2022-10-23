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

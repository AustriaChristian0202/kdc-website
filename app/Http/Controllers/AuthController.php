<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
  //
  public function signIn()
  {
    return Inertia::render('Auth/SignIn');
  }


  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
      $request->session()->regenerate();
      if (auth()->user()->role == 'admin') {
        return redirect()->route('admin.home.index');
      } else {
        return redirect()->route('client.appointment.index');
      }
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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

  public function registerClient(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed',
      'contact' => 'required|string|digits:11',
      'sex' => 'required|in:male,female',
      'age' => 'required|integer',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'contact' => $request->contact,
      'sex' => $request->sex,
      'age' => $request->age,
      'role' => 'client',
    ]);



    return redirect()->route('auth.sign-in')->with(
      [
        'message' => [
          'type' => 'success',
          'content' => 'Account created successfully'
        ]
      ]
    );
  }

  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    $user = Socialite::driver('google')->user();

    $existingUser = User::where('email', $user->email)->first();

    if ($existingUser) {
      auth()->login($existingUser, true);
      if ($existingUser->role == 'admin') {
        return redirect()->route('admin.home.index');
      } else {
        return redirect()->route('client.appointment.index');
      }
    } else {
      $newUser = User::create([
        'name' => $user->name,
        'email' => $user->email,
        'role' => 'client',
      ]);

      auth()->login($newUser, true);
    }

    return redirect()->route('client.appointment.index');
  }
}

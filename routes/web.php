<?php

use App\Http\Controllers\Admin\Appointment;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AppointmentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return Inertia::render('Home/Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
  })->name('dashboard');

  // client routes
  Route::prefix('client')
    ->name('client.')
    ->group(function () {
      Route::resource('appointment', AppointmentController::class);
    });

  Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
      Route::get('home', [HomeController::class, 'index'])->name('home.index');

      Route::controller(Appointment::class)
        ->name('appointment.')
        ->prefix('appointment')
        ->group(function () {
          Route::get('', 'index')->name('index');
        });

      Route::get('profile', function () {
        return Inertia::render('Profile/AdminProfile');
      })->name('profile.index');
    });
});

Route::get('/auth/sign-in', function () {
  return Inertia::render('Auth/SignIn');
})->name('auth.sign-in');

Route::get('/auth/sign-up', function () {
  return Inertia::render('Auth/SignUp');
})->name('auth.sign-up');


Route::controller(AuthController::class)
  ->prefix('auth/')
  ->name('auth.')
  ->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'login')->name('register');
    Route::get('sign-in', 'signIn')->name('sign-in');
    Route::post('register-client', 'registerClient')->name('register-client');
  });

<?php

use App\Http\Controllers\Admin\Appointment;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\AppointmentController;
use Spatie\GoogleCalendar\Event;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
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
      Route::get('appointment-selected-date/{date}', [AppointmentController::class, 'getSelectedDateAppointment'])->name('appointment-selected-date');
      Route::get('my-appointments', [AppointmentController::class, 'myAppointments'])->name('my-appointments');
      Route::get('reschedule-appointment/{appointment_id}', [AppointmentController::class, 'rescheduleForm'])->name('reschedule-form');
      Route::post('reschedule-appointment/{appointment_id}', [AppointmentController::class, 'reschedule'])->name('reschedule');
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
          Route::post('status-change', 'statusChange')->name('status-change');
          Route::get('appointments-by-date/{date?}', 'appointmentsByDate')->name('by-date');
          Route::post('store', 'store')->name('store');
          Route::get('create', 'create')->name('create');
          Route::get('reschedule/{appointment_id}', 'rescheduleForm')->name('reschedule-form');
          Route::post('reschedule/{appointment_id}', 'reschedule')->name('reschedule');
          Route::post('reject/{id}', 'onReject')->name('reject');
        });

      Route::get('force-send-email', function () {
        Artisan::call('daily-client:schedule-reminder');

        return redirect()->back()->with([
          'message' => [
            'type' => 'success',
            'content' => 'Email sent'
          ]
        ]);
      })->name('force-send-email');
      Route::resource('client', ClientController::class);

      Route::controller(ReportController::class)
        ->name('report.')
        ->prefix('report')
        ->group(function () {
          Route::get('appointment', 'appointment')->name('appointment.index');
          Route::get('appointment/export', 'appointmentExport')->name('appointment.export');
        });



      Route::get('profile', function () {
        return Inertia::render('Profile/AdminProfile');
      })->name('profile.index');
    });

  Route::get('test-calendar', function () {
    Event::create([
      'name' => 'A new event',
      'startDateTime' => Carbon\Carbon::now(),
      'endDateTime' => Carbon\Carbon::now()->addHour(),
    ]);
  });
});

Route::get('test-calendar', function () {
  Event::create([
    'name' => 'A new event',
    'startDateTime' => Carbon\Carbon::now(),
    'endDateTime' => Carbon\Carbon::now()->addHour(),
  ]);
});

Route::middleware(['guest'])->group(function () {
  Route::get('/auth/sign-in', function () {
    return Inertia::render('Auth/SignIn');
  })->name('auth.sign-in');

  Route::get('/auth/sign-up', function () {
    return Inertia::render('Auth/SignUp');
  })->name('auth.sign-up');

  // google login

  Route::get('social/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
  Route::get('social/google/callback', [AuthController::class, 'handleGoogleCallback']);


  Route::controller(AuthController::class)
    ->prefix('auth/')
    ->name('auth.')
    ->group(function () {
      Route::post('login', 'login')->name('login');
      Route::post('register', 'login')->name('register');
      Route::get('sign-in', 'signIn')->name('sign-in');
      Route::post('register-client', 'registerClient')->name('register-client');
    });
});

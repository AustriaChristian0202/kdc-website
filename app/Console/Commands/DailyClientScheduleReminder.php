<?php

namespace App\Console\Commands;

use App\Mail\DailyClientScheduleReminder as MailDailyClientScheduleReminder;
use App\Mail\DailyScheduleReminderMail;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyClientScheduleReminder extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'daily-client:schedule-reminder';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This will send email to client 1 day before their appointment';

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    // get all the appointments for tomorrow
    $appointments = Appointment::whereDate('schedule', Carbon::tomorrow())
      ->with(['client', 'dentist'])
      ->get();

    // get all the clients email and schedule
    $clients = $appointments->map(function ($appointment) {
      return [
        'email' => $appointment->client->email,
        'name' => $appointment->client->name,
        'dentist' => $appointment->dentist->name,
        'service' => $appointment->service,
        'schedule' => Carbon::parse($appointment->schedule)->format('F d, Y h:i A'),
      ];
    });


    // send email to all the clients with their schedule with default template
    foreach ($clients as $client) {
      // send email to client
      Mail::to($client['email'])->send(
        new DailyScheduleReminderMail($client)
      );

      $this->info('Successfully sent email to ' . $client['email']);
    }

    return Command::SUCCESS;
  }
}

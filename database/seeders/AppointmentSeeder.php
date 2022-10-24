<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // get all clients
    $clients = User::where('role', 'client')->get();

    // get all dentists
    $dentists = User::where('role', 'admin')->get();

    // create 100 appointments

    for ($i = 0; $i < 100; $i++) {
      $client = $clients->random();
      $dentist = $dentists->random();

      $client->appointments()->create(
        [
          'user_id' => $client->id,
          'name' => $client->name,
          'contact' => fake()->phoneNumber(),
          'created_by' => $client->id,
          'dentist_id' => $dentist->id,
          'service' => fake()->randomElement([
            "Consultation",
            "Teeth Whitening",
            "Teeth Cleaning",
            "Orthodontic Treatment",
            "Modern Dentistry Services",
            "Teeth/Dental Bonding",
            "Cosmetic Fillings",
            "Dentures",
            "Root Canal Therapy"
          ]),

          'schedule' => fake()->dateTimeBetween('-1 year', '+1 year'),
          'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
          'sex' => fake()->randomElement(['male', 'female']),
          'age' => fake()->randomNumber(2),
        ]
      );
    }
  }
}

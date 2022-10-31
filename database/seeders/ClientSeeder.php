<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //

    for ($i = 0; $i < 100; $i++) {
      User::create(
        [
          'name' => fake()->name(),
          'email' => fake()->safeEmail(),
          'contact' => "09" . fake()->numberBetween(100000000, 999999999),
          'sex' => fake()->randomElement(['male', 'female']),
          'age' => fake()->randomNumber(2),
          'email_verified_at' => now(),
          'password' => Hash::make('password'),
        ]
      );
    }
  }
}

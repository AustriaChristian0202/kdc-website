<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
          'contact' => fake()->phoneNumber(),
          'sex' => fake()->randomElement(['male', 'female']),
          'age' => fake()->randomNumber(2),
          'email_verified_at' => now(),
          'password' => Hash::make('password'),
        ]
      );
    }
  }
}

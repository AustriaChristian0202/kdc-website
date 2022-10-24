<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DentistSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $dentists = [
      [
        'name' => 'Dr. Raymond S. Kasilag',
        'email' => 'dentist1@mail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ],
      [
        'name' => 'Dr. Desiree Z. Kasilag',
        'email' => 'dentist2@mail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ],
      [
        'name' => 'Dr. Mark S. Kasilag',
        'email' => 'dentist3@mail.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ]
    ];

    foreach ($dentists as $dentist) {
      \App\Models\User::create($dentist);
    }
  }
}

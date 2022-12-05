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
        'email' => 'raymond_kasilag@gmail.com',
        'password' => Hash::make('Admin123'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ],
      [
        'name' => 'Dr. Desiree Z. Kasilag',
        'email' => 'desiree_kasilag@gmail.com',
        'password' => Hash::make('Admin123'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ],
      [
        'name' => 'Dr. Mark S. Kasilag',
        'email' => 'mark_kasilag@gmail.com',
        'password' => Hash::make('Admin123'),
        'role' => 'admin',
        'email_verified_at' => now(),
      ]
    ];

    foreach ($dentists as $dentist) {
      \App\Models\User::create($dentist);
    }
  }
}

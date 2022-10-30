<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('appointments', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id')->nullable();
      $table->unsignedBigInteger('created_by');
      $table->string('name');
      $table->integer('age');
      $table->string('contact');
      $table->enum('service', [
        "Consultation",
        "Teeth Whitening",
        "Teeth Cleaning",
        "Orthodontic Treatment",
        "Modern Dentistry Services",
        "Teeth/Dental Bonding",
        "Cosmetic Fillings",
        "Dentures",
        "Root Canal Therapy"
      ]);
      $table->dateTime('schedule');
      $table->unsignedBigInteger('dentist_id');
      $table->enum('sex', ['male', 'female']);
      $table->enum('status', [
        'pending', 'approved', 'rejected', 'cancelled', 'rescheduled'
      ])->default('pending');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('appointments');
  }
};

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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('google_id')->nullable();
      $table->string('contact')->nullable();
      $table->integer('age')->nullable();
      $table->enum('sex', ['male', 'female'])->nullable();
      $table->string('password')->nullable();
      $table->rememberToken();
      $table->foreignId('current_team_id')->nullable();
      $table->string('profile_photo_path', 2048)->nullable();
      $table->enum('role', ['admin', 'client'])->default('client');
      $table->timestamps();
      $table->softDeletes();
    });
  }
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
};

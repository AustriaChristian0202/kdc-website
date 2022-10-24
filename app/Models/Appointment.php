<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'age',
    'schedule',
    'contact',
    'service',
    'dentist_id',
    'user_id',
    'created_by'
  ];

  public function dentist()
  {
    return $this->belongsTo(User::class, 'dentist_id');
  }

  public function client()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}

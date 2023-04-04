<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctService extends Model
{
    use HasFactory;
    protected $fillable = [
      'itser_type',
      'employee_code',
      'com_id',
      'employee_note',
      'approval_code',
      'person_code',
      'person_note',
      'employee_close',
      'person_close',
      'itser_status',
    ];
}

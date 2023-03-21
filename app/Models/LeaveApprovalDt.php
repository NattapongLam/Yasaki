<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApprovalDt extends Model
{
    use HasFactory;
    protected $fillable = [
      "leavapp_id",
      "leavsub_type",
      "leavsub_empcode",
      "leavsub_empname",
    ];
}

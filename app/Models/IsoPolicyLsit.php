<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoPolicyLsit extends Model
{
    use HasFactory;
    protected $fillable = [
        'pol_date',
        'pol_name',
        'pol_file',
        'pol_status'
      ];
}

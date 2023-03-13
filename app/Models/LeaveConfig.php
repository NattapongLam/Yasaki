<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'leav_code',
        'leav_name',
        'leav_status',
        'leav_save'
    ];
}

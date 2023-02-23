<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'gruo_code',
        'gruo_name',
        'gruo_status'

    ];
}

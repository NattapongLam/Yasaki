<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineService extends Model
{
    use HasFactory;
    protected $fillable = [
        'serv_name',
        'serv_status'
    ];
}

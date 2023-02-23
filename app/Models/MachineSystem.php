<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineSystem extends Model
{
    use HasFactory;
    protected $fillable = [
        'syst_name',
        'syst_status'
    ];
}

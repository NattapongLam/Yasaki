<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    protected $fillable = [
        "ltype_name",
        "ltype_qty",
        "ltype_desc",
        "ltype_status"
    ];
}

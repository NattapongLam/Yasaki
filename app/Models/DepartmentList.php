<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentList extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_code',
        'department_name',
        'department_refcode',
        'department_status',
        'department_save'       
    ];
}

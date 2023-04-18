<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoPpeDepartmentHD extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'year_name',
        'month_name',
        'job_desc',
        'safety_01',
        'safety_02',
        'safety_03',
        'safety_04',
        'safety_05',
        'safety_06',
        'safety_07',
        'safety_08',
        'safety_09',
        'safety_10',
        'safety_11',
        'safety_12',
        'safety_13',
        'safety_other',
        'personsave',
        'approvalsave',
        'flag'
    ];
}

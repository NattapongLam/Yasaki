<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeList extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_code',
        'employee_fullname',
        'employee_company',
        'employee_job',
        'employee_taxid'   ,
        'employee_sex',
        'employee_country',
        'employee_image',
        'department_id',
        'department_code',
        'approval_id',
        'employee_status',
        'employee_save'   
    ];
}

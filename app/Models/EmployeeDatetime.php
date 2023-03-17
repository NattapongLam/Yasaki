<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDatetime extends Model
{
    use HasFactory;
    protected $fillable = [
      "emp_times_empcode",
      "emp_times_empfullname",
      "emp_times_depcode",
      "emp_times_result",
      "emp_times_remark",
      "emp_times_date",
      "emp_times_company",
      "emp_times_save",
      "roworder",
    ];
}

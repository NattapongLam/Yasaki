<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingResultHd extends Model
{
    use HasFactory;
    protected $fillable = [
        'pkgresult_date',
        'pkgresult_empfull',
        'pkgresult_empqty',
        'pkgresult_empdel',
        'pkgresult_absent',
        'pkgresult_leave',
        'pkgresult_sick',
        'pkgresult_vacation',
        'pkgresult_maternity',
        'pkgresult_remark',
        'pkgresult_save',
        'pkgresult_status',
    ];   
}

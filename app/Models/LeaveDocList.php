<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveDocList extends Model
{
    use HasFactory;
    protected $fillable = [
      "ldoc_datestart",
      "ldoc_dateend",
      "lconf_id",
      "ltype_id",
      "employee_code",
      "employee_fullname",
      "approval_id",
      "ldoc_fileup",
      "ldoc_reamrk",
      "lsta_id",
      "ldoc_save",
      "ldoc_appsave",
      "ldoc_appdesc",
    ];
}

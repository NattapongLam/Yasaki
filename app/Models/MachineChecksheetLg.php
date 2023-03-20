<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineChecksheetLg extends Model
{
    use HasFactory;
    protected $fillable = [
    "checksheetmc_note_id",
    "checksheetmc_hd_docuno",
    "checksheetmc_note_no",
    "checksheetmc_note_empname",
    "checksheetmc_note_remark",
    ];
}

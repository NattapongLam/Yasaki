<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineChecksheetHd extends Model
{
    use HasFactory;
    protected $fillable = [
        "checksheetmc_hd_date",
        "checksheetmc_hd_docuno",
        "ms_machine_code",
        "ms_machine_name",
        "ms_machine_group_code",
        "checksheetmc_hd_note",
        "checksheetmc_hd_save",
        "checksheetmc_hd_flag",
        "checksheetmc_hd_filename",
    ];
}

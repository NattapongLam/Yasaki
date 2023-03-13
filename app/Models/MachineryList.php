<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineryList extends Model
{
    use HasFactory;
    protected $fillable = [
      "machinery_hd_date"
      ,"machinery_hd_docuno"
      ,"machinery_hd_type"
      ,"ms_machine_code"
      ,"ms_machine_name"
      ,"department_name"
      ,"machinery_hd_lcaol"
      ,"ms_machine_system_name"
      ,"ms_machine_service_name"
      ,"machinery_hd_save"
      ,"machinery_hd_note"
      ,"machinery_hd_number"
      ,"machinery_hd_checksave"
      ,"machinery_hd_checkdate"
      ,"machinery_hd_checknote"
      ,"machinery_hd_status_id"
      ,"machinery_hd_personsave"
      ,"vendor_code"
      ,"vendor_name"
      ,"machinery_hd_refdocuno"
      ,"machinery_hd_pic1"
      ,"machinery_hd_pic2"  
    ];
}

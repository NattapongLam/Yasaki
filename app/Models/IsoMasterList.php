<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoMasterList extends Model
{
    use HasFactory;
    protected $fillable = [
      'iso_doculist_listno',
      'iso_doculist_date',
      'iso_doculist_forcedate',
      'iso_docugroup_name',
      'iso_docutype_code',
      'iso_doculist_code',
      'iso_doculist_name',
      'iso_docustatus_name',
      'emp_department_refcode',
      'iso_docustatus_location',
      'iso_docustatus_reamrk',
      'iso_doculist_check',
      'iso_doculist_partfile',
      'iso_doculist_filename',
      'iso_doculist_save',
      'revision00',
      'revision01',
      'revision02',
      'revision03',
      'revision04',
      'revision05',
      'revision06',
      'revision07',
      'revision08',
      'revision09',
      'revision10',
      'revision11',
      'revision12',
      'revision13',
      'revision14',
      'revision15',
    ];
}

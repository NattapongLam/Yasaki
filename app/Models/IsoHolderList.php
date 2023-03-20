<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoHolderList extends Model
{
    use HasFactory;
    protected $fillable = [
      "iso_docutype_code",
      "iso_doculist_id",
      "iso_doculist_code",
      "iso_doculist_name",
      "iso_doculist_copy",
      "iso_doculist_revision",
      "iso_docuholder_listno",
      "emp_department_refcode",
      "recipient_person",
      "recipient_date",
      "return_person",
      "return_date",
      "iso_docuholder_destroy",
      "iso_docuholder_remark",
      "iso_docuholder_save",
      "iso_docuholder_status",
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctChecksheet extends Model
{
    use HasFactory;
    protected $fillable = [
      'cit_date',
      'com_id',
      'com_name',
      'cit_check1',
      'cit_check2',
      'cit_check3',
      'cit_check4',
      'cit_check5',
      'cit_remark',
      'cit_save',
      'cit_approval',
    ];
}

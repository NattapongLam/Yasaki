<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePlantip extends Model
{
    use HasFactory;
    protected $fillable = [
      'tip_date',
      'cust_id',
      'tip_remark',
      'tip_type',
      'tip_plan',
      'tip_action',
      'tip_flag',
      'tip_save'
    ];
}

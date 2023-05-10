<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingResultDt extends Model
{
    use HasFactory;
    protected $fillable = [
      'pkgresult_id',
      'pkgresult_listno',
      'pkgresult_pdcode',
      'pkgresult_pdname',
      'pkgresult_pdunit',
      'pkgresult_pdqty',
      'pkgresult_note',
      'pkgresult_flag',
      'pkgresult_pdtype',
    ];
}

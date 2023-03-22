<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctMonthkpi extends Model
{
    use HasFactory;
    protected $fillable = [
      'kpi_date',
      'dep_name',
      'kpi_name',
      'kpi_file',
    ];
}

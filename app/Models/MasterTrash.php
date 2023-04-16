<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTrash extends Model
{
    use HasFactory;
    protected $fillable = [
      'tras_listno',
      'tras_name',
      'tras_unit',
      'tras_flag',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctComputerList extends Model
{
    use HasFactory;
    protected $fillable = [
      'com_listno',
      'com_name',
      'com_ip',
      'com_desc',
      'com_users',
      'com_locat',
      'com_type',
      'com_status',
      'com_os',
      'com_ramrk',
      'com_save'
    ];

    
}

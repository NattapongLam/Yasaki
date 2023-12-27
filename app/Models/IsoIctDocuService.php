<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctDocuService extends Model
{
    use HasFactory;
    protected $fillable = [
      'serv_type',
      'serv_user',
      'serv_com',
      'serv_job',
      'serv_dep',
      'serv_remark',
      'serv_case',
      'serv_note',
      'personsave',
      'persondate',
      'personcheck',
      'checkdate',
      'personict',
      'ictdate',
      'approvedsave',
      'approveddate',
      'close_note',
      'close_save',
      'close_date',
      'status',
      'closeit_save',
      'closeit_date',
      ];
}

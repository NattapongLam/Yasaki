<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;
    protected $fillable = [
        'mc_code',
        'mc_name',
        'mc_brand',
        'mc_size',
        'mc_date',
        'mc_remark',
        'mc_status',
        'mc_pdt',
        'mcgroup_id',
    ];

    public function machinegroup()
    {
        return $this->belongsTo(MachineGroup::class,'mcgroup_id');
    }

}


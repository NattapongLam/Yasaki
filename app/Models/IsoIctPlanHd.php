<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctPlanHd extends Model
{
    use HasFactory;
    protected $fillable = [
        'year_name',
        'planhd_save',
        'planhd_remark',
        'approval_save',
        'approval_date',
        'planhd_type',
        'approval_note'
    ];
    public function coms()
    {
        return $this->hasMany(IsoIctPlanDt::class,'planhd_id');
    }
}

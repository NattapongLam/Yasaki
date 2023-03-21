<?php

namespace App\Models;

use App\Models\LeaveApprovalDt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveApprovalHd extends Model
{
    use HasFactory;
    protected $fillable = [
      "leavapp_code",
      "leavapp_name",
      "leavapp_remark",
      "leavapp_status",
      "leavapp_save",
    ];
    public function emps()
    {
        return $this->hasMany(LeaveApprovalDt::class,'leavapp_id');
    }
}

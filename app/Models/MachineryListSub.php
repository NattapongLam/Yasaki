<?php

namespace App\Models;

use App\Models\MachineryList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineryListSub extends Model
{
    use HasFactory;
    protected $fillable = [
        'machinery_hd_id',
        'machinery_hd_docuno',
        'machinery_dt_listno',
        'machinery_dt_remark',
        'machinery_dt_hour',
        'machinery_dt_date',
        'machinery_dt_flag',
        'machinery_dt_id',
        'mclist_id'
    ];
    public function MachineryLists()
    {
        return $this->belongsTo(MachineryList::class,'mclist_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assessemphd extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'assessemp_hd';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public function assessempdt()
    {
        return $this->hasMany(assessempdt::class, 'assessemp_hd_id', 'id');
    }


}

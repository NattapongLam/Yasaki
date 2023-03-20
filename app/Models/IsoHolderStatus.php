<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoHolderStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        "hold_name",
      ];
}

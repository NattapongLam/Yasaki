<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoDocumentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_typcode',
        'doc_typname',
    ];
}

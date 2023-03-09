<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoDocumentGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'doc_grocode',
        'doc_groname',
    ];
}

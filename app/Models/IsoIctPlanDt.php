<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsoIctPlanDt extends Model
{
    use HasFactory;
    protected $fillable = [
        'planhd_id',
        'plandt_listno',
        'plandt_comname',
        'plandt_comlocat',
        'plandt_person',
        'plandt_reamrk',
        'plandt_check01',
        'plandt_action01',
        'plandt_check02',
        'plandt_action02',
        'plandt_check03',
        'plandt_action03',
        'plandt_check04',
        'plandt_action04',
        'plandt_check05',
        'plandt_action05',
        'plandt_check06',
        'plandt_action06',
        'plandt_check07',
        'plandt_action07',
        'plandt_check08',
        'plandt_action08',
        'plandt_check09',
        'plandt_action09',
        'plandt_check10',
        'plandt_action10',
        'plandt_check11',
        'plandt_action11',
        'plandt_check12',
        'plandt_action12',
        'com_id'
    ];
}

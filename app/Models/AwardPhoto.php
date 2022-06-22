<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwardPhoto extends Model
{
    use HasFactory;

    protected $table='award_photos';

    protected $fillable=[
        'award_id',
        'award_photo'
    ];

   
    public function award()
    {
        return $this->belongsTo(Award::class, 'award_id', 'id');
    }
    
}

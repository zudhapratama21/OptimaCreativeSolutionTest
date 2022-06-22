<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $table='awards';
    protected $fillable=[
        'name',
        'description',
        'thumbnail_photo'
    ];

  
    public function articlePhoto()
    {
        return $this->hasMany(AwardPhoto::class, 'award_id');
    }


}

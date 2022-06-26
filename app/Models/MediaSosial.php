<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSosial extends Model
{
    use HasFactory;

    protected $table = 'media_sosials';
    protected $fillable=[
        'username',
        'type',
        'description'
    ];    
}

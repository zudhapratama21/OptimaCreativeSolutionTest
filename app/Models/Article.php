<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'title',
        'thumbnail_title',        
        'thumbnail_photo',
        'meta',
        'meta_title',
        'meta_description',
        'description'
    ];

  
    public function articlePhoto()
    {
        return $this->hasMany(Article_Photo::class, 'article_id');
    }

    
}


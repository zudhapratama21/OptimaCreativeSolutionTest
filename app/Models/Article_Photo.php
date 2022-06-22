<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Photo extends Model
{
    use HasFactory;
    protected $table = 'article_photos';

    protected $fillable = [
        'article_id',
        'photo_article'
    ];

   
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

}

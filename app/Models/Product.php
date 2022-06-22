<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable=[
        'service_id',
        'name_company',
        'name_application',
        'location',
        'industry',
        'size',
        'case',
        'works',
        'link',        
    ];
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
  
    public function productPhoto()
    {
        return $this->hasMany(Product_Photo::class, 'id');
    }



}

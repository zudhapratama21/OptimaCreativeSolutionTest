<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'Services';

    protected $fillable = [
        'name',
        'is_active'
    ];
    
    public function product()
    {
        return $this->hasMany(Product::class, 'service_id');
    }


}

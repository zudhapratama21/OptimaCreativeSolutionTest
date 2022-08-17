<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = "employees";

    protected $fillable = [
        'company',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

  
    public function companyrel()
    {
        return $this->belongsTo(Company::class, 'company', 'id');
    }

}

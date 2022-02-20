<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relaciones uno a muchos

    public function empleos()
    {
        return $this->hasMany(Empleo::class);
    }
    
}

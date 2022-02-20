<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modo extends Model
{
    use HasFactory;

    // Relaciones muchos a muchos empleo-modo

    public function empleos()
    {
        return $this->belongsToMany(Empleo::class);
    }
    
}

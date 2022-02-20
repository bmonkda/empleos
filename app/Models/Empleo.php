<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    // Relaciones uno a muchos inversa
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relaciones muchos a muchos empleo-modo

    public function modos()
    {
        return $this->belongsToMany(Modo::class);
    }

}

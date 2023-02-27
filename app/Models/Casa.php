<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Le indicamos los atributos del modelo qué serán asignables
    protected $fillable = [
        'titulo', 'precio', 'dimension','slug', 'entradilla', 'texto', 'fecha', 'autor', 'imagen'
    ];
}

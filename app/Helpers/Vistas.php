<?php

namespace App\Helpers;

class Vistas
{
    public static function titulo($activo){
        return ($activo == 1) ? "Desactivar" : "Activar";
    }

    public static function color($activo){
        return ($activo == 1) ? "green-text" : "red-text";
    }

    public static function icono($activo){
        return ($activo == 1) ? "mood" : "mood_bad";
    }
}

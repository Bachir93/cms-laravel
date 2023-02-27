<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CasaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer este request
     *
     * @return bool
     */
    // Compruebo si el usuario tiene permisos para la accion
    public function authorize()
    {
        return Auth::check();
        // La forma mas correcta: return (Auth::user()->usuarios == 1);
    }

    /**
     * Obtiene las reglas de validación para este request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        //Título requerido, máximo 32 caracteres
        //Slug máximo 36 caracteres (no requerido porque se generaría solo)
        //Entradilla máximo 128 caracteres (no requerida)
        $rules = [
            'titulo' => 'required|max:32',
            'slug' => 'max:36',
            'entradilla' => 'max:128',
        ];

        return $rules;

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Casa;

class AppController extends Controller
{
    public function index()
    {
        //Obtengo las casas a mostrar en la home
        $rowset = Casa::where('activo', 1)->where('home', 1)->orderBy('fecha', 'DESC')->get();

        return view('app.index',[
            'rowset' => $rowset,
        ]);
    }

    public function casas()
    {
        //Obtengo las casas a mostrar en el listado de casas
        $rowset = Casa::where('activo', 1)->orderBy('fecha', 'DESC')->get();

        return view('app.casas',[
            'rowset' => $rowset,
        ]);
    }

    public function casa($slug)
    {
        //Obtengo la casa o muestro error y le indico que coja el primero que encuentre con el campo activo y con el slug indicado
        $row = Casa::where('activo', 1)->where('slug', $slug)->firstOrFail();

        return view('app.casa',[
            'row' => $row,
        ]);
    }

    public function acercade()
    {
        return view('app.acerca-de');
    }

    //Métodos para la API (podrían ir en otro controlador)

    public function mostrar(){

        //Obtengo las casas a mostrar en el listado de casas
        $rowset = Casa::where('activo', 1)->orderBy('fecha', 'DESC')->get();

        //Opción rápida (datos completos)
        //$casas = $rowset;

        //Opción personalizada
        foreach ($rowset as $row){
            $casas[] = [
                'titulo' => $row->titulo,
                'precio' => $row->precio,
                'dimension' => $row->dimension,
                'entradilla' => $row->entradilla,
                'autor' => $row->autor,
                'fecha' => date("d/m/Y", strtotime($row->fecha)),
                'enlace' => url("casa/".$row->slug),
                'imagen' => asset("img/".$row->imagen)
            ];
        }

        //Devuelvo JSON
        return response()->json(
            $casas, //Array de objetos
            200, //Tipo de respuesta
            [], //Headers
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE //Opciones de escape
        );

    }

    public function leer(){

        //Url de destino
        $url = 'http://13.41.79.144/villoldo-laravel/public/index.php/mostrar';

        //Parseo datos a un array
        $rowset = json_decode(file_get_contents($url), true);

        //LLamo a la vista
        return view('api.leer',[
            'rowset' => $rowset,
        ]);

    }
}

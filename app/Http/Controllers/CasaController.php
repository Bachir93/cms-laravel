<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casa;
use App\Http\Requests\CasaRequest;
use App\Helpers\Funciones;

class CasaController extends Controller
{
    public function __construct()
    {
        /**
         * Asigno el middleware auth al controlador,
         * de modo que sea necesario estar al menos autenticado
         */
        $this->middleware('auth');
    }
    /**
     * Mostrar un listado de elementos
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Página a mostrar
        $pagina = ($request->pagina) ? $request->pagina : 1;

        //Obtengo todas las casas ordenadas por fecha más reciente
        $rowset = Casa::orderBy("fecha","DESC")->paginate(2,['*'],'pagina',$pagina);

        return view('admin.casas.index',[
            'rowset' => $rowset,
        ]);
    }

    /**
     * Mostrar el formulario para crear un nuevo elemento
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //Creo un nuevo usuario vacío
        $row = new Casa();

        return view('admin.casas.editar',[
            'row' => $row,
        ]);
    }

    /**
     * Guardar un nuevo elemento en la bbdd
     *
     * @param  \App\Http\Requests\CasaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(CasaRequest $request)
    {
        $row = Casa::create([
            'titulo' => $request->titulo,
            'precio' => $request->precio,
            'dimension' => $request->dimension,
            'entradilla' => $request->entradilla,
            // Le indico que utilice el siguiete helper
            'slug' => Funciones::getSlug($request->titulo),
            'texto' => $request->texto,
            'fecha' => \DateTime::createFromFormat("d-m-Y", $request->fecha)->format("Y-m-d H:i:s"),
            'autor' => $request->autor,
        ]);

        //Imagen
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = $archivo->getClientOriginalName();
            $archivo->move(public_path()."/img/", $nombre);
            Casa::where('id', $row->id)->update(['imagen' => $nombre]);
            $texto = " e imagen subida.";
        }
        else{
            $texto = ".";
        }

        return redirect('admin/casas')->with('success', 'Casa <strong>'.$request->titulo.'</strong> creada'.$texto);
    }

    /**
     * Mostrar el formulario para editar un elemento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //Obtengo la casa o muestro error
        $row = Casa::where('id', $id)->firstOrFail();

        return view('admin.casas.editar',[
            'row' => $row,
        ]);
    }

    /**
     * Actualizar un elemento en la bbdd
     *
     * @param  \App\Http\Requests\CasaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(CasaRequest $request, $id)
    {
        $row = Casa::findOrFail($id);

        Casa::where('id', $row->id)->update([
            'titulo' => $request->titulo,
            'precio' => $request->precio,
            'dimension' => $request->dimension,
            'entradilla' => $request->entradilla,
            // Le indico que utilice el siguiente helper
            'slug' => Funciones::getSlug($request->titulo),
            'texto' => $request->texto,
            'fecha' => \DateTime::createFromFormat("d-m-Y", $request->fecha)->format("Y-m-d H:i:s"),
            'autor' => $request->autor,
        ]);

        //Imagen
        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombre = $archivo->getClientOriginalExtension();
            $archivo->move(public_path()."/img/", $nombre);
            Casa::where('id', $row->id)->update(['imagen' => $nombre]);
            $texto = " e imagen subida.";
        }
        else{
            $texto = ".";
        }

        return redirect('admin/casas')->with('success', 'Casa <strong>'.$request->titulo.'</strong> guardada'.$texto);
    }

    /**
     * Activar o desactivar elemento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activar($id)
    {
        $row = Casa::findOrFail($id);
        $valor = ($row->activo) ? 0 : 1;
        $texto = ($row->activo) ? "desactivada" : "activada";

        Casa::where('id', $row->id)->update(['activo' => $valor]);

        return redirect('admin/casas')->with('success', 'Casa <strong>'.$row->titulo.'</strong> '.$texto.'.');
    }

    /**
     * Mostrar o no elemento en la home.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function home($id)
    {
        $row = Casa::findOrFail($id);
        $valor = ($row->home) ? 0 : 1;
        $texto = ($row->home) ? "no se muestra en la home" : "se muestra en la home";

        Casa::where('id', $row->id)->update(['home' => $valor]);

        return redirect('admin/casas')->with('success', 'Casa <strong>'.$row->titulo.'</strong> '.$texto.'.');
    }

    /**
     * Borrar elemento (e imagen asociada si existe).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)
    {
        $row = Casa::findOrFail($id);

        Casa::destroy($row->id);

        //Borrar imagen
        if ($row->imagen){
            $imagen = public_path()."/img/".$row->imagen;
            if (file_exists($imagen)){
                unlink($imagen);
            }
        }

        return redirect('admin/casas')->with('success', 'Casa <strong>'.$row->titulo.'</strong> borrada.');
    }

}

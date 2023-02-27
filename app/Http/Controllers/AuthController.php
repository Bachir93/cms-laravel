<?php

namespace App\Http\Controllers;

// Usamos la libreria request para los formularios

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function acceder()
    {
        return view('auth.acceso');
    }

    public function autenticar(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $credentials['activo'] = 1;
        // Comprobaremos si existe el usuario con las credencias introducidas en la base de datos
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Me llevará a la página de inicio del panel de administracion
            return redirect()->intended('admin')->withSuccess('Bienvenido al panel de Administración');
        }
        // Me dirige hacia un paso atras, o sea al formulario
        return back()->withErrors([
            'email' => 'El email no está registrado.',
        ]);
    }

    public function registro()
    {
        return view('auth.registro');
    }

    public function registrarse(Request $request)
    {
        $request->validate([
            // Para el registro se requiere de un nombre, una direccion de email unica y una
            // password que tenga minimo 6 caracteres y qué ambas comtraseñas conicidan
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->all();
        // Le indico qué me inserte en la tabla un nombre, un email y una password
        $usuario = Usuario::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        // Permitimos el login al usuario de forma directa
        Auth::login($usuario);

        return redirect("admin")->withSuccess('Te has registrado correctamente. Bienvenido');
    }

    //Regeneramos la sesion
    public function salir(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin');
    }
}

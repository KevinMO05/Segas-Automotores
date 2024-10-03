<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register(Request $request)
    {

        $usuario = new Usuario();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && $usuario->email == $request->email) {
            return redirect('/login')->with('error', 'El usuario ya existe');
        } else {
            $usuario->save();
            return redirect('/login')->with('success', 'Usuario registrado exitosamente');
        }
    }

    public function login(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if ($validated->fails()) {
            return redirect('/login')->with('error', 'El correo electrónico debe contener un @');
        }
        
        $validateded = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validated();

        $email = $validateded['email'];
        $password = $validateded['password'];



        $usuario = Usuario::where('email', $request->email)->first();


        if ($usuario && $usuario->email === $email && $usuario->password === $password  ) {
            return redirect('/')->with('success', 'Credenciales Correctas');
        } else {
            return redirect('/login')->with('error', 'Credenciales Incorrectas');
        }
    }
}

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
            return redirect('/')->with('error', 'El usuario ya existe');
        } else {
            $usuario->save();
            return redirect('/welcome')->with('success', 'Usuario registrado exitosamente');
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
            return redirect('/welcome')->with('success', 'Credenciales Correctas');
        } else {
            return redirect('/')->with('error', 'Credenciales Incorrectas');
        }
    }
}

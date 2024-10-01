<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function register(Request $request){
        
        $usuario = new Usuario();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();
        return redirect('/login');
    }

    public function login(Request $request){
        $usuario = Usuario::where('email', $request->email)->first();

    

        if($usuario->email == $request->email && $usuario->password == $request->password){
            return redirect('/');
        }else{
            return "Credenciales Incorrectas";
        }
    }
}

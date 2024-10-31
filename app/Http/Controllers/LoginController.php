<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function register(Request $request)
    {

        // Crear un validador
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'dni' => 'required|string|max:8|unique:users,dni',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits:9',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ], [
            // Mensajes de error personalizados
            'name.required' => 'El nombre es obligatorio.',
            'dni.unique' => 'El DNI ya está registrado.',
            'email.unique' => 'El correo ya está en uso.',
            'phone.numeric' => 'El teléfono debe contener solo números.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        // Comprobar si la validación falla
        if ($validator->fails()) {
            return redirect('/')->with('error', $validator->errors()->first());
        }

        // Intentar crear el usuario
        try {
            $usuario = User::create([
                'name' => $request->name,
                'dni' => $request->dni,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => bcrypt($request->password), // Encriptar la contraseña
            ]);

            return redirect('/')->with('success', 'Usuario registrado exitosamente');
        } catch (QueryException $e) {
            return redirect('/')->with('error', 'Error al registrar el usuario. Intenta nuevamente.');
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



        $usuario = User::where('email', $request->email)->first();


        if ($usuario && $usuario->email === $email && Hash::check($request->password, $usuario->password)) {
            return redirect('welcome');
        } else {
            return redirect('/')->with('error', 'Credenciales Incorrectas');
        }
    }
}

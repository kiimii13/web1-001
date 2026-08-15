<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function mostrarRegistro(): View
    {
        return view('auth.registro');
    }

    public function registrar(Request $request): RedirectResponse
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'unique:users,correo'],
            'clave' => ['required', 'string', 'min:6'],
        ]);

        $usuario = User::create([
            'nombre' => $datos['nombre'],
            'correo' => $datos['correo'],
            'clave' => bcrypt($datos['clave']),
        ]);

        Auth::login($usuario);

        $request->session()->regenerate();

        return redirect()->route('proyectos.index');
    }

    public function mostrarLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $datos = $request->validate([
            'correo' => ['required', 'email'],
            'clave' => ['required', 'string'],
        ]);

        $usuario = User::where('correo', $datos['correo'])->first();

        if ($usuario && Hash::check($datos['clave'], $usuario->clave)) {
            Auth::login($usuario);

            $request->session()->regenerate();

            return redirect()->route('proyectos.index');
        }

        return back()
            ->withErrors([
                'correo' => 'Las credenciales ingresadas no son correctas.',
            ])
            ->onlyInput('correo');
    }
    public function logout(Request $request): RedirectResponse
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}

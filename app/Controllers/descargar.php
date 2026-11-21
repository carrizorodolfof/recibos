<?php


namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (auth()->check()) {
            // El usuario está logueado
            $usuariox = auth()->user();
            echo "¡Hola, " . $usuariox->username . "!";
        } else {
            // El usuario no está logueado
            echo "Por favor, inicia sesión.";
        }        
        return view('descargar');
    }
}

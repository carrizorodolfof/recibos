<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;

class PerfilController extends Controller
{
    public function cambiarPassword()
    {
        return view('perfil/cambiar_password');
    }

    public function actualizarPassword()
    {
        $users = new UserModel();

        $user = auth()->user();

        $newPassword     = $this->request->getPost('password_nueva');
        $confirmPassword = $this->request->getPost('password_confirmar');

        // verificar confirmación
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error','Las contraseñas no coinciden');
        }

        // actualizar contraseña
        $user->password = $newPassword;

        $users->save($user);

        return redirect()->back()->with('success','Contraseña actualizada correctamente');
    }
}
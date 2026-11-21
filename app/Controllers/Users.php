<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $q = $this->request->getGet('q');

        if ($q) {
            $model->like('username', $q);
        }

        $data = [
            'users' => $model->paginate(10),
            'pager' => $model->pager,
            'q'     => $q,
        ];

        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $users = auth()->getProvider();

        $users->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ]);

        $user = $users->findById($users->getInsertID());

        if ($this->request->getPost('is_admin')) {
            $user->addGroup('admin');
        }

        return redirect()->to('/users')->with('message', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $users = auth()->getProvider();
        $user  = $users->findById($id);

        if (! $user) {
            return redirect()->to('/users')->with('error', 'Usuario no encontrado.');
        }

        return view('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $users = auth()->getProvider();
        $user  = $users->findById($id);

        if (! $user) {
            return redirect()->to('/users')->with('error', 'Usuario no encontrado.');
        }

        $datos = [
            'username' => trim($this->request->getPost('username')),
            'email'    => trim($this->request->getPost('email')),
            'active'   => $this->request->getPost('active') ? 1 : 0,
        ];

        $nuevaPassword = $this->request->getPost('password');
        if (! empty($nuevaPassword)) {
            $datos['password'] = $nuevaPassword;
        }

        $user->fill($datos);
        $users->save($user);

        return redirect()->to('/users')->with('message', 'Datos del usuario actualizados correctamente.');
    }

    public function delete($id)
    {
        $users = auth()->getProvider();
        $users->delete($id, true);

        return redirect()->to('/users')->with('message', 'Usuario eliminado.');
    }
}
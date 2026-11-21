<?php
// app/Controllers/Users.php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
public function index()
{
    $model = new \App\Models\UserModel();

    $q = $this->request->getGet('q');

    if ($q) {
        $model->like('username', $q);
    }

    $data = [
        'users' => $model->paginate(10),
        'pager' => $model->pager
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

    $user = $users->save([
        'username' => $this->request->getPost('username'),
        'password' => $this->request->getPost('password'),
    ]);

    $user = $users->findById($users->getInsertID());

    // asignar rol
    if ($this->request->getPost('is_admin')) {
        $user->addGroup('admin');
    }

    return redirect()->to('/users');
}

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);

        return view('users/edit', $data);
    }

public function update($id)
{
    $model = new \App\Models\UserModel();

    $model->update($id, [
        'username' => $this->request->getPost('username'),
        'active'   => $this->request->getPost('active') ? 1 : 0,
    ]);

    return redirect()->to('/users');
}

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/users');
    }
}
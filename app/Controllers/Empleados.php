<?php

namespace App\Controllers;
use App\Models\EmpleadoModel;

class Empleados extends BaseController
{
/*
    public function index()
    {
        $model = new EmpleadoModel();
        $data['empleados'] = $model->findAll();

        return view('empleados/index', $data);
    }
*/

    public function index()
    {
        $model = new EmpleadoModel();

        // Validad ROL del Usuario
        /*
        if (session('rol') !== 'admin') {
            return redirect()->to('/empleados')->with('error', 'No autorizado');
        }        
        */
        $buscar = $this->request->getGet('buscar');
    
        if ($buscar) {
            $empleados = $model
                ->like('nombre', $buscar)
                ->orLike('cuil', $buscar)
                ->orLike('email', $buscar)
                ->findAll();
        } else {
            $empleados = $model->findAll();
        }
    
        return view('empleados/index', [
            'empleados' => $empleados,
            'buscar' => $buscar
        ]);
    }


    public function create()
    {
        return view('/empleados/create');
    }

    public function store()
    {
        $rules = [
            'nombre' => 'required|min_length[3]|is_unique[empleados.nombre]',
            'cuil'   => 'required|numeric|min_length[11]|max_length[11]|is_unique[empleados.cuil]',
            'email'  => 'required|valid_email|is_unique[empleados.email]',
        ];
        /*
        $rules = [
            'nombre' => 'required|min_length[3]',
            'cuil'   => 'required|numeric|min_length[11]|max_length[11]',
            'email'  => 'required|valid_email',
            'obsmail'=> 'permit_empty|max_length[200]'
        ];
        */
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $model = new EmpleadoModel();
    
        // Convertir a Mayusculas
        /*
        $nombre = $this->request->getPost('nombre');
        $nombreMayuscula = mb_strtoupper($nombre, 'UTF-8'); // 'UTF-8' es importante [13]
        $email = $this->request->getPost('email');
        $emailMayuscula = mb_strtoupper($email, 'UTF-8'); 
        $obsmail = $this->request->getPost('obsmail');
        $obsmailMayuscula = mb_strtoupper($obsmail, 'UTF-8'); 
        */
        $model->save([
            'nombre'  => $this->request->getPost('nombre'),
            'cuil'    => $this->request->getPost('cuil'),
            'email'   => $this->request->getPost('email'),
            'obsmail' => $this->request->getPost('obsmail'),
        ]);
    
        return redirect()->to('/empleados')->with('success', 'Empleado creado correctamente');
    }
/*        
    public function store()
    {
        $model = new EmpleadoModel();

        $model->save([
            'nombre'  => $this->request->getPost('nombre'),
            'cuil'    => $this->request->getPost('cuil'),
            'email'   => $this->request->getPost('email'),
            'obsmail' => $this->request->getPost('obsmail'),
        ]);

        return redirect()->to('/empleados');
    }
*/
    public function edit($id)
    {
        $model = new EmpleadoModel();
        $data['empleado'] = $model->find($id);

        return view('empleados/edit', $data);
    }

    public function update($id)
    {
        $model = new EmpleadoModel();

        $empleado = $model->find($id);
        $rules = [
            'nombre' => "required|min_length[3]|is_unique[empleados.nombre,id,{$id}]",
            'cuil'   => "required|numeric|min_length[11]|max_length[11]|is_unique[empleados.cuil,id,{$id}]",
            'email'  => "required|valid_email|is_unique[empleados.email,id,{$id}]",
        ];
/*
        $rules = [
            'nombre' => 'required|min_length[3]|is_unique[empleados.nombre]',
            'cuil'   => 'required|numeric|min_length[11]|max_length[11]|is_unique[empleados.cuil]',
            'email'  => 'required|valid_email|is_unique[empleados.email]',
        ];
*/    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $model = new EmpleadoModel();
    
        $model->update($id, [
            'nombre'  => $this->request->getPost('nombre'),
            'cuil'    => $this->request->getPost('cuil'),
            'email'   => $this->request->getPost('email'),
            'obsmail' => $this->request->getPost('obsmail'),
        ]);
    
        return redirect()->to('/empleados')->with('success', 'Empleado actualizado');
    }
/*        
    public function update($id)
    {
        $model = new EmpleadoModel();

        $model->update($id, [
            'nombre'  => $this->request->getPost('nombre'),
            'cuil'    => $this->request->getPost('cuil'),
            'email'   => $this->request->getPost('email'),
            'obsmail' => $this->request->getPost('obsmail'),
        ]);

        return redirect()->to('/empleados');
    }
*/
    public function delete($id)
    {
        $model = new EmpleadoModel();
        $model->delete($id);

        return redirect()->to('/empleados');
    }
}
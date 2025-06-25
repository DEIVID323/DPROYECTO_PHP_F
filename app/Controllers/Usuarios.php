<?php
namespace App\Controllers;
use App\Models\UsuarioModel;


class Usuarios extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $data['usuarios'] = $this->usuarioModel->findAll();
        return view('usuarios/index', $data);
    }

    public function crear()
    {
        return view('usuarios/crear');
    }

    public function guardar()
    {
        $data = [
            'Nombre'     => $this->request->getPost('nombre'),
            'Correo'     => $this->request->getPost('correo'),
            'Contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'Rol_idRol'  => 4 // Asignar rol de cliente
        ];
        
        $this->usuarioModel->insert($data);
        return redirect()->to('/usuarios');
    }
}
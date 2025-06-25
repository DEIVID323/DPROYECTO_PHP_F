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
        return view('usuarios/usuarios', $data);
    }

    public function crear()
    {
        return view('usuarios/crear');
    }

    public function guardar()
    {
        $data = [
            'Nombre' => $this->request->getPost('nombre'),
            'Correo' => $this->request->getPost('correo'),
            'Contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'Rol_idRol' => $this->request->getPost('rol')
        ];
        
        $this->usuarioModel->insert($data);
        return redirect()->to('/usuarios');
    }

    public function editar($id)
    {
        $data['usuario'] = $this->usuarioModel->find($id);
        return view('usuarios/editar', $data);
    }

    public function actualizar($id)
    {
        $data = [
            'Nombre' => $this->request->getPost('nombre'),
            'Correo' => $this->request->getPost('correo'),
            'Rol_idRol' => $this->request->getPost('rol')
        ];

        if ($this->request->getPost('contrasena')) {
            $data['Contrasena'] = password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT);
        }

        $this->usuarioModel->update($id, $data);
        return redirect()->to('/usuarios');
    }

    public function eliminar($id)
    {
        $this->usuarioModel->delete($id);
        return redirect()->to('/usuarios');
    }
}


?>
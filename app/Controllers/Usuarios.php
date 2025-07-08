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
                // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        // Si todo bien, carga la vista del dashboard
        return view('usuarios/index', $data);
    }


    public function crear()
    {
        return view('usuarios/crear');
    }


    public function guardar()
    {
        $model = new UsuarioModel();
        $model->insert($this->request->getPost());
       

        return redirect()->to('/usuarios');
    }


  public function editar($id) 
    {
        // Verificar si hay sesión iniciada
        if (!session()->has('logged_in')) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
        }

        // Obtener el usuario a editar
        $data['usuario'] = $this->usuarioModel->find($id);
        
        // Verificar que el usuario existe
        if (!$data['usuario']) {
            return redirect()->to('/usuarios')->with('error', 'Usuario no encontrado.');
        }

        // Verificar si el usuario logueado puede editar este usuario
        // Opción 1: Solo puede editar su propio perfil
        if (session()->get('idUsuario') != $id) {
            return redirect()->to('/usuarios')->with('error', 'Solo puedes editar tu propio perfil.');
        }

        /* Opción 2: Administrador puede editar cualquier usuario, usuarios normales solo su propio perfil
        $usuarioLogueado = session()->get('idUsuario');
        $rolLogueado = session()->get('Rol_idRol');
        
        if ($rolLogueado != 1 && $usuarioLogueado != $id) {
            return redirect()->to('/usuarios')->with('error', 'No tienes permisos para editar este usuario.');
        }
        */

        // Si todo bien, carga la vista de edición
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
    try {
        if (!$this->usuarioModel->delete($id)) {
            throw new \Exception('Error al eliminar el usuario');
        }


        // Si es una solicitud AJAX, devolver JSON
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Usuario eliminado correctamente'
            ]);
        }
           return $this->response->setJSON([
                'success' => true,
                'message' => 'Usuario eliminado correctamente'
            ]);


    } catch (\Exception $e) {
        // Si es una solicitud AJAX, devolver error JSON
     
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No se puede eliminar el usuario porque tiene relaciones en otras tablas.'
            ]);
        





    //return redirect()->to('/dashboard/usuarios/')->with('error', 'No se puede eliminar el usuario porque tiene relaciones en otras tablas.');
    }
}
}
?>

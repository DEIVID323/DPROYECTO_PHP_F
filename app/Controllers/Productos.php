<?php
namespace App\Controllers;
use App\Models\ProductoModel;

class Productos extends BaseController  
{
    public function index ()
    { 
        $model = new ProductoModel ();
        $data['productos'] = $model->findAll();
                // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        // Si todo bien, carga la vista del dashboard

        return view('productos/index', $data);
    }
    public function crear() 
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        // Si todo bien, carga la vista del dashboard
        return view('productos/crear');
    }

    public function guardar()
    {
        $model = new ProductoModel();
        $model->insert($this->request->getPost());
                        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        return redirect()->to('/productos');
    }

    public function editar($id)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);
                // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        // Si todo bien, carga la vista del dashboard
        return view ('/productos/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new ProductoModel();
        $model->update($id, $this->request->getPost());
                        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }
        
        return redirect()->to('/productos');
    }public function eliminar($id)
{
    // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
    if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
        return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
    }

    try {
        $model = new ProductoModel();

        if (!$model->delete($id)) {
            throw new \Exception('Error al eliminar el producto');
        }

        // Si es una solicitud AJAX, devolver JSON
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Producto eliminado correctamente'
            ]);
        }

        // Si no es AJAX, redireccionar normal
        return redirect()->to('/productos')->with('success', 'Producto eliminado correctamente.');

    } catch (\Exception $e) {
        // Si es una solicitud AJAX, devolver error JSON
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No se puede eliminar el producto porque tiene relaciones en otras tablas.'
            ]);
        }

        // Si no es AJAX, redireccionar con error
        return redirect()->to('/productos')->with('error', 'No se puede eliminar el producto porque tiene relaciones en otras tablas.');
    }
}
}
?>
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

        return view('productos/index', $data);
    }
    
    public function crear() 
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        return view('productos/crear');
    }

    public function guardar()
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        $model = new ProductoModel();
        $model->insert($this->request->getPost());
        
        return redirect()->to('/productos');
    }

    public function editar($id)
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        $model = new ProductoModel();
        $data['producto'] = $model->find($id);
        
        return view ('/productos/editar', $data);
    }

    public function actualizar($id)
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }
        
        $model = new ProductoModel();
        $model->update($id, $this->request->getPost());
        
        return redirect()->to('/productos');
    }

    public function eliminar($id)
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

    // Nuevo método para eliminación masiva
    public function eliminar_masivo()
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ]);
        }

        try {
            $json = $this->request->getJSON();
            $ids = $json->ids ?? [];
            
            if (empty($ids)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No se seleccionaron productos para eliminar.'
                ]);
            }

            $model = new ProductoModel();
            $eliminados = 0;
            
            foreach ($ids as $id) {
                if ($model->delete($id)) {
                    $eliminados++;
                }
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => "Se eliminaron $eliminados productos correctamente."
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al eliminar los productos: ' . $e->getMessage()
            ]);
        }
    }

    // Nuevo método para ver detalles del producto
    public function detalles($id)
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No tienes permisos para realizar esta acción.'
            ]);
        }

        try {
            $model = new ProductoModel();
            $producto = $model->find($id);
            
            if (!$producto) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Producto no encontrado.'
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'producto' => $producto
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al obtener los detalles del producto.'
            ]);
        }
    }
}
?>
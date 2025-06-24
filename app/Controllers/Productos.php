<?php
namespace App\Controllers;
use App\Models\ProductoModel;

class Productos extends BaseController  
{
    public function index ()
    { 
        $model = new ProductoModel ();
        $data['productos'] = $model->findAll();
        return view('productos/index', $data);
    }
    public function crear() 
    {
        return view('productos/crear');
    }

    public function guardar()
    {
        $model = new ProductoModel();
        $model->insert($this->request->getPost());
        return redirect()->to('/productos');
    }

    public function editar($id)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);
        return view ('/productos/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new ProductoModel();
        $model->update($id, $this->request->getPost());
        
        return redirect()->to('/productos');
    }
    public function eliminar($id)
    {
        $model = new ProductoModel();
        $model->delete($id);

        return redirect()->to('/productos');

    }

}

?>
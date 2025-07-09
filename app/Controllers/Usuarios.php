<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    $model = new UsuarioModel();
    $data['usuario'] = $model->find($id);

    if (!$data['usuario']) {
        return redirect()->to('/usuarios')->with('error', 'Usuario no encontrado.');
    }

    if (!session()->has('logged_in')) {
        return redirect()->to('/login')->with('error', 'Debes iniciar sesión.');
    }

    // Permitir solo editar su propio perfil o si es administrador
    if (session()->get('idUsuario') != $id && session()->get('Rol_idRol') != 1) {
        return redirect()->to('/usuarios')->with('error', 'Solo puedes editar tu propio perfil.');
    }

    return view('/usuarios/editar', $data);
}


    public function actualizar($id)
    {

    $model = new UsuarioModel();
    $model->update($id, $this->request->getPost());
    return redirect()->to('/usuarios');


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
public function exportarExcel()
    {
        $model = new UsuarioModel();
        $usuario =$model->findAll();

        $excel = new  Spreadsheet();
        $sheet  = $excel->getActiveSheet();

        //Encabezados del excel
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('E1', 'Contrasena');
        $sheet->setCellValue('F1', 'Direccion');
        $sheet->setCellValue('D1', 'Telefono');
      
        $sheet->setCellValue('E1', 'Rol_idRol');

        $fila = 2; // Comienza en la fila 2 para los datos
        foreach ($usuario as $usuario) {
            $sheet->setCellValue('A' . $fila, $usuario['Nombre']);
            $sheet->setCellValue('B' . $fila, $usuario['Apellido']);
            $sheet->setCellValue('C' . $fila, $usuario['Correo']);
            $sheet->setCellValue('E' . $fila, $usuario['Contrasena']);
            $sheet->setCellValue('F' . $fila, $usuario['Direccion']);
            $sheet->setCellValue('D' . $fila, $usuario['Telefono']);

            $sheet->setCellValue('E' . $fila, $usuario['Rol_idRol']);
            $fila++;
        }

        if (ob_get_length()) {
        ob_end_clean();
    }

        $writer = new Xlsx($excel);
        $filename = 'empleados_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit; // Asegúrate de salir después de enviar el archivo
  }
}
?>

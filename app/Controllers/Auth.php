<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login()
    {
        return view('login');
    }

    public function validarLogin()
    {
        $correo     = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $this->usuarioModel->where('Correo', $correo)->first();

if (!$usuario) {
    return redirect()->back()->with('error', 'Usuario no encontrado.');
}

if (!password_verify($contrasena, $usuario['Contrasena'])) {
    return redirect()->back()->with('error', 'Contraseña incorrecta.');
}

session()->set([
    'idUsuario' => $usuario['idUsuario'],
    'Nombre'    => $usuario['Nombre'],
    'Rol_idRol' => $usuario['Rol_idRol'],
    'logged_in' => true
]);

// Redirigir dependiendo del rol
if ($usuario['Rol_idRol'] ==   1) { // 4 = Cliente (según tu base de datos)
    return redirect()->to(base_url('/inicio'));
} else {
    return redirect()->to(base_url('/dashboard'));
}
}



    public function registrar()
    {
        $data = [
            'Nombre'     => $this->request->getPost('nombre'),
            'Correo'     => $this->request->getPost('correo'),
            'Contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'Rol_idRol'  => 4
        ];

        // 👉 Aquí podrías añadir más campos si quieres diferenciar empleados o admins
        // $data['Rol_idRol'] = 2; // ejemplo: 2 para cliente, 1 para admin

        $this->usuarioModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registro exitoso.');
    }

}

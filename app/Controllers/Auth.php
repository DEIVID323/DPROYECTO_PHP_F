<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Auth extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new LoginModel();
    }

    public function login()
    {
        // Si ya está logueado, redirigir según su rol
        if (session()->has('logged_in') && session()->get('logged_in')) {
            return $this->redirectByRole();
        }
        
        return view('login');
    }

    public function validarLogin()
    {
        $correo = $this->request->getPost('correo');
        $contrasena = $this->request->getPost('contrasena');

        $usuario = $this->usuarioModel->where('Correo', $correo)->first();

        if (!$usuario || !password_verify($contrasena, $usuario['Contrasena'])) {
            return redirect()->back()->with('error', 'Credenciales incorrectas.');
        }

        // Establecer sesión
        session()->set([
            'idUsuario' => $usuario['idUsuario'],
            'Nombre' => $usuario['Nombre'],
            'Correo' => $usuario['Correo'],
            'Rol_idRol' => $usuario['Rol_idRol'],
            'logged_in' => true,
            'usuario' => $usuario['idUsuario'], // Para compatibilidad
            'perfil' => $usuario['Rol_idRol'] // Para compatibilidad
        ]);

        return $this->redirectByRole();
    }

    public function registrar()
    {
        $data = [
            'Nombre' => $this->request->getPost('nombre'),
            'Correo' => $this->request->getPost('correo'),
            'Contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
            'Rol_idRol' => 4
        ];

        $this->usuarioModel->insert($data);
        return redirect()->to('/login')->with('success', 'Registro exitoso.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // Métodos auxiliares
    public function isLoggedIn()
    {
        return session()->has('logged_in') && session()->get('logged_in') === true;
    }

    public function hasRole($roleId)
    {
        return $this->isLoggedIn() && session()->get('Rol_idRol') == $roleId;
    }

    public function isAdmin()
    {
        return $this->hasRole(1);
    }

    public function isDashboardUser()
    {
        return $this->hasRole(1) || $this->hasRole(2); // Admin o Empleado
    }

    private function redirectByRole()
    {
        $rol = session()->get('Rol_idRol');
        
        if ($rol == 1 || $rol == 2) { // Admin o Empleado
            return redirect()->to('/dashboard');
        } elseif ($rol == 4) { // Cliente
            return redirect()->to('/inicio');
        }
        
        return redirect()->to('/login');
    }
}
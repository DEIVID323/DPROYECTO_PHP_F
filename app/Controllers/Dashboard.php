<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    { 
                // Si ya está logueado, redirigir según su rol
        if (session()->has('logged_in') && session()->get('logged_in')) {
            return $this->redirectByRole();
        }
        
        return view('login');
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

?>

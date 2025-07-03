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

    // Redirige al usuario según su rol almacenado en la sesión
    private function redirectByRole()
    {
        $role = session()->get('role');
        switch ($role) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'user':
                return redirect()->to('/user/dashboard');
            default:
                return redirect()->to('/login');
        }
    }
}

?>

<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Verificar si hay sesión iniciada y si es administrador (Rol_idRol == 1)
        if (!session()->has('logged_in') || session()->get('Rol_idRol') != 1) {
            return redirect()->to('/login')->with('error', 'Debes iniciar sesión como administrador.');
        }

        // Si todo bien, carga la vista del dashboard
        return view('dashboard/index');
    }
}

?>

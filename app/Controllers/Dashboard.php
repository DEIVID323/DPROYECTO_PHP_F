<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Puedes enviar datos si lo deseas
        return view('dashboard/index');
    }
}

?>

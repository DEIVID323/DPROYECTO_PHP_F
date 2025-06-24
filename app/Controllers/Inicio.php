<?php
namespace App\Controllers; 

class Inicio extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }
    public function cerrarSesion()
{
    session()->destroy();
    return redirect()->to(base_url('/'));
}
}

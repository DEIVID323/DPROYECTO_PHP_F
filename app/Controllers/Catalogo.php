<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Catalogo extends BaseController
{ 
    public function index ()
    {
    return view('/catalogo/index');
    }
}
?>
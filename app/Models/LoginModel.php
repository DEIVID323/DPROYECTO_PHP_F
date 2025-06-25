<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'usuario';
    protected $primaryKey = 'idUsuario';
    protected $allowedFields = ['Nombre', 'Correo', 'Contrasena', 'Rol_idRol'];

}

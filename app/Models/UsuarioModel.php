<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario'; // njombre de tu tbla
    protected $primaryKey = 'idUsuario'; // tu pk 
    protected $allowedFields = [
        'Nombre', 'Apellido', 'Correo', 'Contraseña', 'Direccion', 'Telefono', 'Fecha_registro', 'Rol_idRol'
    ];

    public $timestamps = false;


}
?>
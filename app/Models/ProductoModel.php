<?php  
namespace App\Models;

use CodeIgniter\Model;


class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idProducto';
protected $allowedFields = [
    'Nombre',
    'Referencia',
    'Precio',
    'Cantidad',
    'Descripcion',
    'Stock',
    'Categoria',
    'Promocion_idCodigo'
];
    public $timestamps = false;

}
?>
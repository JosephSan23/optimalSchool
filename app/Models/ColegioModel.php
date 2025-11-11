<?php 
namespace App\Models;
use CodeIgniter\Model;

class ColegioModel extends Model 
{
    protected $table = 'colegio';
    protected $primaryKey = 'id_colegio';
    protected $allowedFields = ['id_colegio', 'nombre_colegio', 'nit', 'direccion', 'telefono', 'correo_institucional', 'tipo', 'ciudad', 'fecha_registro'];

    public function obtenerTodos() 
    {
        return $this->findAll();
    }

    public function obtenerPorId($id) {
        return $this->asArray()->find($id);
    }
}
?>
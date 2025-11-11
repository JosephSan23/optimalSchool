<?php 
namespace App\Models;
use CodeIgniter\Model;

class EstudianteModel extends Model 
{
    protected $table = 'estudiante';
    protected $primaryKey = 'id_estudiante';
    protected $allowedFields = ['id_estudiante', 'fecha_ingreso', 'estado'];

    //METODO PARA OBTENER TODOS LOS ESTUDIANTES CON DATOS DE USUARIO
}
?>
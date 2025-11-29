<?php
namespace App\Models;
use CodeIgniter\Model;

class EstudianteCursoModel extends Model
{
    protected $table = 'estudiante_curso';
    protected $primaryKey = ['id_estudiante', 'id_curso'];
    protected $returnType = 'array';
    protected $allowedFields = ['id_estudiante', 'id_curso', 'estado', 'fecha_inscripcion', 'fecha_retiro'];

  
}


?>
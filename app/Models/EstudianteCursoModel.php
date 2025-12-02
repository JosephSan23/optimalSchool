<?php
namespace App\Models;
use CodeIgniter\Model;

class EstudianteCursoModel extends Model
{
    protected $table = 'estudiante_curso';
    protected $primaryKey = ['id_estudiante', 'id_curso'];
    protected $returnType = 'array';
    protected $allowedFields = ['id_estudiante', 'id_curso', 'estado', 'fecha_inscripcion', 'fecha_retiro'];


    public function obtenerCursosPorEstudiante(int $idEstudiante)
    {
        $builder = $this->db->table($this->table . ' ec')
            ->select('c.id_curso, c.nombre_curso, c.grado, c.descripcion, ec.estado AS estado_asignacion, ec.fecha_inscripcion, ec.fecha_retiro')
            ->join('curso c', 'c.id_curso = ec.id_curso', 'left')
            ->where('ec.id_estudiante', $idEstudiante)
            ->orderBy('c.grado', 'ASC')
            ->orderBy('c.nombre_curso', 'ASC');

        return $builder->get()->getResultArray();
    }

    public function obtenerEstudiantesPorCurso(int $idCurso)
    {
        $builder = $this->db->table($this->table . ' ec')
            ->select('u.id_usuario, u.primer_nombre, u.segundo_nombre, u.primer_apellido, u.segundo_apellido, u.documento, ec.estado AS estado_asignacion, ec.fecha_inscripcion, ec.fecha_retiro')
            ->join('usuario u', 'u.id_usuario = ec.id_estudiante', 'left')
            ->where('ec.id_curso', $idCurso)
            ->orderBy('u.primer_apellido', 'ASC');

            return $builder->get()->getResultArray();
    }
    public function existeAsignacion(int $idEstudiante, int $idCurso): bool
    {
        $row = $this->where('id_estudiante', $idEstudiante)
                    ->where('id_curso', $idCurso)
                    ->countAllResults(false); // false para no resetear el builder

        return $row > 0;
    }
    
    public function asignarEstudiante(array $data)
    {
        if (empty($data['id_estudiante']) || empty($data['id_curso'])) {
            return false;
        }

        $idEst = (int)$data['id_estudiante'];
        $idCur = (int)$data['id_curso'];

        if ($this->existeAsignacion($idEst, $idCur)) {
            return false; // ya existe
        }

        // Solo permitir campos permitidos
        $insertData = [
            'id_estudiante' => $idEst,
            'id_curso' => $idCur,
            'estado' => $data['estado'] ?? 'Activo',
            'fecha_inscripcion' => $data['fecha_inscripcion'] ?? date('Y-m-d'),
            'fecha_retiro' => $data['fecha_retiro'] ?? null,
        ];

        return $this->insert($insertData);
    }

    public function retirarEstudiante(int $idEstudiante, int $idCurso)
    {
        return (bool) $this->where('id_estudiante', $idEstudiante)
                    ->where('id_curso', $idCurso)
                    ->delete();
    }

    public function actualizarEstadoAsignacion(int $idEstudiante, int $idCurso, string $estado)
    {
        return (bool) $this->where('id_estudiante', $idEstudiante)
                           ->where('id_curso', $idCurso)
                           ->set(['estado' => $estado])
                           ->update();
    }

    public function contarCursosPorEstudiante(int $idEstudiante)
    {
        return (int) $this->where('id_estudiante', $idEstudiante)->countAllResults();
    }
  
}




?>
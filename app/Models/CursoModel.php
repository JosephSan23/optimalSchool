<?php 
namespace App\Models;
use CodeIgniter\Model;

class CursoModel extends Model 
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    protected $allowedFields = ['colegio_id', 'nombre_curso', 'grado', 'descripcion', 'capacidad_maxima', 'estado', 'created_at', 'updated_at'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function obtenerCursos(?int $colegio_id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('curso.*');

        if ($colegio_id !== null)
        {
            $builder->where('curso.colegio_id', $colegio_id);
        }

        $builder->orderBy('curso.grado', 'ASC')->orderBy('curso.nombre_curso', 'ASC');
        return $builder->get()->getResultArray();
    }

    public function obtenerCursoPorId(int $id)
    {
        $row = $this->asArray()->find($id);
        return $row === null ? null : $row;
    }

    public function guardarCurso(array $data)
    {
        if (!empty($data['id_curso'])) {
           $id = (int) $data['id_curso'];
           unset($data['id_curso']);
           $this->update($id, $data);
           return $id;
        }

        $this->insert($data);
        return $this->getInsertID();
    }

    public function eliminarCurso(int $id)
    {
        return (bool) $this->delete($id);
    }

    public function contarEstudiantesPorCurso(?int $colegio_id = null)
    {
        $builder = $this->db->table('curso c')
            ->select('c.id_curso, COUNT(ec.id_estudiante) AS alumnos')
            ->join('estudiante_curso ec', 'ec.id_curso = c.id_curso', 'left')
            ->groupBy('c.id_curso');
        
        if ($colegio_id !== null) 
        {
            $builder->where('c.colegio_id', $colegio_id);
        }

        $rows = $builder->get()->getResultArray();

        $result = [];
        foreach ($rows as $r)
        {
            $result[(int)$r['id_curso']] = (int)$r['alumnos'];
        }
        return $result;
    }

}

?>
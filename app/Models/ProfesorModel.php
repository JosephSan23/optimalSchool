<?php 
namespace App\Models;
use CodeIgniter\Model;
use config\Database;

class ProfesorModel extends Model 
{
    protected $table = 'profesor';
    protected $primaryKey = 'id_profesor';
    protected $allowedFields = ['id_profesor', 'titulo_academico', 'experiencia_anios'];

    public function obtenerProfesores(?int $colegio_id = null): array
    {
        $builder = $this->db->table('usuario')
            ->select('usuario.id_usuario, usuario.colegio_id, usuario.rol, usuario.primer_nombre, usuario.segundo_nombre, 
            usuario.primer_apellido, usuario.segundo_apellido, usuario.tipo_documento, usuario.documento, usuario.username, usuario.correo, 
            usuario.telefono, usuario.direccion, usuario.fecha_nacimiento, usuario.contrasena, profesor.titulo_academico, profesor.experiencia_anios')
            ->join('profesor', 'profesor.id_profesor = usuario.id_usuario')
            ->where('usuario.rol', 'profesor');

        if ($colegio_id !== null)
        {
            $builder->where('usuario.colegio_id', $colegio_id);
        }

        return $builder->get()->getResultArray();
    }

    public function obtenerProfesorPorId(int $id)
    {
        return $this->db->table('usuario')
            ->select('usuario.*, profesor.titulo_academico, profesor.experiencia_anios')
            ->join('profesor', 'profesor.id_profesor = usuario.id_usuario')
            ->where('usuario.id_usuario', $id)
            ->where('usuario.rol', 'profesor')
            ->get()
            ->getRowArray();
    }

    public function CrearProfesorCompleto(array $usuarioData, array $profesorData)
    {
        $db = Database::connect();
        $db->transStart();

        $db->table('usuario')->insert($usuarioData);
        $idUsuario = $db->insertID();

        if(!$idUsuario) {
            $db->transComplete();
            return false;
        }

        $profesorData['id_profesor'] = $idUsuario;
        $db->table('profesor')->insert($profesorData);

        $db->transComplete();

        if($db->transStatus() === false) 
        {
            return false;
        }

        return $idUsuario;
    }

       public function actualizarProfesorCompleto(int $idUsuario, array $usuarioData, array $profesorData): bool
    {
        $db = Database::connect();
        $db->transStart();

        $db->table('usuario')->where('id_usuario', $idUsuario)->update($usuarioData);
        $db->table('profesor')->where('id_profesor', $idUsuario)->update($profesorData);

        $db->transComplete();

        return $db->transStatus();
    }

    public function eliminarProfesor(int $idUsuario): bool
    {
        $db = Database::connect();
        $db->transStart();

        // Primero eliminar detalle profesor
        $db->table('profesor')->where('id_profesor', $idUsuario)->delete();
        // Luego eliminar usuario
        $db->table('usuario')->where('id_usuario', $idUsuario)->delete();

        $db->transComplete();

        return $db->transStatus();

    }
}

?>
<?php 
namespace App\Models;
use CodeIgniter\Model;
use config\Database;

class AcudienteModel extends Model 
{
    protected $table = 'acudiente';
    protected $primaryKey = 'id_acudiente';
    protected $allowedFields = ['id_acudiente', 'parentesco'];

    public function obtenerAcudientes(?int $colegio_id = null): array
    {
        $builder = $this->db->table('usuario')
            ->select('usuario.id_usuario, usuario.colegio_id, usuario.rol, usuario.primer_nombre, usuario.segundo_nombre, 
            usuario.primer_apellido, usuario.segundo_apellido, usuario.tipo_documento, usuario.documento, usuario.username, usuario.correo, 
            usuario.telefono, usuario.direccion, usuario.fecha_nacimiento, acudiente.parentesco')
            ->join('acudiente', 'acudiente.id_acudiente = usuario.id_usuario')
            ->where('usuario.rol', 'acudiente');

        if ($colegio_id !== null)
        {
            $builder->where('usuario.colegio_id', $colegio_id);
        }

        return $builder->get()->getResultArray();
    }

    public function obteneracudientePorId(int $id)
    {
        return $this->db->table('usuario')
            ->select('usuario.*, acudiente.parentesco')
            ->join('acudiente', 'acudiente.id_acudiente = usuario.id_usuario')
            ->where('usuario.id_usuario', $id)
            ->where('usuario.rol', 'acudiente')
            ->get()
            ->getRowArray();
    }

    public function crearAcudienteCompleto(array $usuarioData, array $acudienteData)
    {
        $db = Database::connect();
        $db->transStart();

        $db->table('usuario')->insert($usuarioData);
        $idUsuario = $db->insertID();

        if(!$idUsuario) {
            $db->transComplete();
            return false;
        }

        $acudienteData['id_acudiente'] = $idUsuario;
        $db->table('acudiente')->insert($acudienteData);

        $db->transComplete();

        if($db->transStatus() === false) 
        {
            return false;
        }

        return $idUsuario;
    }

       public function actualizarAcudienteCompleto(int $idUsuario, array $usuarioData, array $acudienteData): bool
    {
        $db = Database::connect();
        $db->transStart();

        $db->table('usuario')->where('id_usuario', $idUsuario)->update($usuarioData);
        $db->table('acudiente')->where('id_acudiente', $idUsuario)->update($acudienteData);

        $db->transComplete();

        return $db->transStatus();
    }

    public function eliminarAcudiente(int $idUsuario): bool
    {
        $db = Database::connect();
        $db->transStart();

        // Primero eliminar detalle acudiente
        $db->table('acudiente')->where('id_acudiente', $idUsuario)->delete();
        // Luego eliminar usuario
        $db->table('usuario')->where('id_usuario', $idUsuario)->delete();

        $db->transComplete();

        return $db->transStatus();

    }
}

?>
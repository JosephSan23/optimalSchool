<?php 
namespace App\Models;
use CodeIgniter\Model;
use config\Database;

class EstudianteModel extends Model 
{
    protected $table = 'estudiante';
    protected $primaryKey = 'id_estudiante';
    protected $allowedFields = ['id_estudiante', 'fecha_ingreso', 'estado'];

    /**
     * Obtener estudiantes. Si se pasa $colegio_id filtra por colegio.
     * Devuelve arreglo con campos de usuario + campos de estudiante.
     *
     * @param int|null $colegio_id
     * @return array
     */
    public function obtenerEstudiantes(?int $colegio_id = null): array
    {
    
        $builder = $this->db->table('usuario')
            ->select('usuario.id_usuario, usuario.colegio_id, usuario.rol, usuario.primer_nombre, usuario.segundo_nombre, 
            usuario.primer_apellido, usuario.segundo_apellido, usuario.tipo_documento, usuario.documento, usuario.username, usuario.correo, 
            usuario.telefono, usuario.direccion, usuario.fecha_nacimiento, estudiante.fecha_ingreso, estudiante.estado')
            ->join('estudiante', 'estudiante.id_estudiante = usuario.id_usuario')
            ->where('usuario.rol', 'estudiante');

        if ($colegio_id !== null) {
            $builder->where('usuario.colegio_id', $colegio_id);
        }

        return $builder->get()->getResultArray();
    }

    /**
     * Obtener un estudiante por id (id_usuario)
     *
     * @param int $id
     * @return array|null
     */

    public function obtenerEstudiantePorId(int $id)
    {
        return $this->db->table('usuario')
            ->select('usuario.*, estudiante.fecha_ingreso, estudiante.estado')
            ->join('estudiante', 'estudiante.id_estudiante = usuario.id_usuario')
            ->where('usuario.id_usuario', $id)
            ->where('usuario.rol', 'estudiante')
            ->get()
            ->getRowArray();
    }

       /**
     * Crear un estudiante completo (inserta en usuario y en estudiante).
     * Usa transacción para mantener consistencia.
     *
     * @param array $usuarioData  // campos para tabla usuario (sin id_usuario)
     * @param array $estudianteData // campos para tabla estudiante (fecha_ingreso, estado). id_estudiante se asigna igual al id_usuario.
     * @return int|false id_usuario insertado o false si falla
     */

    public function crearEstudianteCompleto(array $usuarioData, array $estudianteData)
    {
        $db = Database::connect();
        $db->transStart();

        // Insertar en tabla usuario
        $db->table('usuario')->insert($usuarioData);
        $idUsuario = $db->insertID();

        if(!$idUsuario) {
            $db->transComplete();
            return false;
        }

         // Preparar datos para estudiante (id_estudiante = id_usuario)
        $estudianteData['id_estudiante'] = $idUsuario;
        $db->table('estudiante')->insert($estudianteData);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return false;
        }

        return $idUsuario;
    }

    /**
     * Actualizar información del estudiante (usuario + estudiante)
     *
     * @param int $idUsuario
     * @param array $usuarioData
     * @param array $estudianteData
     * @return bool
     */
    public function actualizarEstudianteCompleto(int $idUsuario, array $usuarioData, array $estudianteData): bool
    {
        $db = Database::connect();
        $db->transStart();

        $db->table('usuario')->where('id_usuario', $idUsuario)->update($usuarioData);
        $db->table('estudiante')->where('id_estudiante', $idUsuario)->update($estudianteData);

        $db->transComplete();

        return $db->transStatus();
    }

    /**
     * Eliminar estudiante (borra fila en estudiante y usuario)
     *
     * @param int $idUsuario
     * @return bool
     */
    public function eliminarEstudiante(int $idUsuario): bool
    {
        $db = Database::connect();
        $db->transStart();

        // Primero eliminar detalle estudiante
        $db->table('estudiante')->where('id_estudiante', $idUsuario)->delete();
        // Luego eliminar usuario
        $db->table('usuario')->where('id_usuario', $idUsuario)->delete();

        $db->transComplete();

        return $db->transStatus();

    }
}
?>
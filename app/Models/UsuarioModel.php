<?php 
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['id_usuario', 'colegio_id','rol', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'tipo_documento', 'documento', 'username', 'correo', 'telefono', 'direccion', 'fecha_nacimiento', 'contrasena'];

    // obtener usuario por ID
    public function obtenerPorId($id) {
        return $this->asArray()->find($id);
    }

    // Buscar por documento
    public function buscarPorDocumento($documento) {
        return $this->where('documento', $documento)->first();
    }

    // Crear Usuario (retorna id insertado o false)
    public function crearUsuario($data) {
        $this->insert($data);
        return $this->getInsertID();
    }

    // Actualizar usuario
    public function actualizarUsuario(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    // Eliminar usuario
    public function eliminarUsuario(int $id)
    {
        return $this->delete($id);
    }
}
?>
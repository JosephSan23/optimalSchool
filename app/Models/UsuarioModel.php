<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowFields = ['id_usuario', 'nombre_usu',
     'pass_usuario','id_perfil','ced_empleado'];
    public $timestamps = false;

    public function VerificarUsuario($usuario, $password)
    { 
        return $this->where('nombre_usu', $usuario)
                    ->where('pass_usuario',$password)
                    ->first();
    }
}
?>
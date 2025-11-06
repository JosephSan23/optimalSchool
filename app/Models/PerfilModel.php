<?php
namespace App\Models;
use CodeIgniter\Model;

class PerfilModel extends Model
{
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';
    protected $allowedFields = ['id_perfil','descripcion_perfil'];
    public $timestamps = false;
}
?>
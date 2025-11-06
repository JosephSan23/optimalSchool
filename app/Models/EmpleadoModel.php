<?php
namespace App\Models;
use CodeIgniter\Model;  

class EmpleadoModel extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'ced_empleado';
    protected $allowedFields = ['ced_empleado', 'nombre_emp', 'apellido_emp',
     'email_emp', 'direccion_emp', 'telefono_emp'];
    
    public $timestamps = false;
}
?>
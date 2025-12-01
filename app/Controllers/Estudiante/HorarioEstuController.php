<?php 
namespace App\Controllers\Estudiante;
use App\Controllers\BaseController;

class HorarioEstuController extends BaseController 
{
    public function index()
    {
        return view('estudiante/secciones/horarios/horario');
    }
}


?>
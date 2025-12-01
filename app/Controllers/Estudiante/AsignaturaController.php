<?php
namespace App\Controllers\Estudiante;
use App\Controllers\BaseController;

class AsignaturaController extends BaseController
{
    public function index()
    {
        return view('estudiante/secciones/asignaturas/asignatura');
    }
}
?>
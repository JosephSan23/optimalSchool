<?php
namespace App\Controllers\Estudiante;
use App\Controllers\BaseController;
class CursoController extends BaseController
{
    public function index()
    {
        return view('estudiante/secciones/cursos/curso');
    }

}
?>
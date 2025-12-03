<?php
namespace App\Controllers\Estudiante;

use App\Controllers\BaseController;
use App\Models\EstudianteCursoModel;

class EstudianteCursoController extends BaseController
{
    protected $colegio_id;
    protected $id_estudiante;

    public function __construct()
    {
        $this->colegio_id    = session()->get('colegio_id');
        $this->id_estudiante = session()->get('id_usuario');
    }

    public function index()
    {
        $model = new EstudianteCursoModel();

        $data['cursos'] = $model
            ->select('
                estudiante_curso.*,
                curso.nombre_curso,
                curso.descripcion,
                curso.grado,
                curso.estado AS estado_curso
            ')
            ->join('curso', 'curso.id_curso = estudiante_curso.id_curso')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.id_usuario', $this->id_estudiante)
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('estudiante_curso.estado', 'activo')
            // ->where('curso.estado', 'activo')
            ->findAll();

            

        return view('estudiante/secciones/cursos/curso', $data);
    }

    // public function detalle($idCurso)
    // {
    //     $model = new EstudianteCursoModel();

    //     $curso = $model
    //         ->select('
    //             estudiante_curso.*,
    //             curso.nombre_curso,
    //             curso.descripcion,
    //             curso.grado
    //         ')
    //         ->join('curso', 'curso.id_curso = estudiante_curso.id_curso')
    //         ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
    //         ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
    //         ->where('usuario.id_usuario', $this->id_estudiante)
    //         ->where('curso.id_curso', $idCurso)
    //         ->where('usuario.colegio_id', $this->colegio_id)
    //         ->first();

    //     if (!$curso) {
    //         return redirect()->back()->with('error', 'No tienes acceso a este curso.');
    //     }

    //     return view('estudiante/cursos/detalle', [
    //         'curso' => $curso
    //     ]);
    // }
}
?>
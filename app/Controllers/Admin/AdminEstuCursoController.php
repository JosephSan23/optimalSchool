<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EstudianteCursoModel;
use App\Models\EstudianteModel;
use App\Models\CursoModel;

class AdminEstuCursoController extends BaseController
{
    protected $colegio_id;

    public function __construct()
    {
        $this->colegio_id = session()->get('colegio_id');
    }

    public function index()
    {
        $model = new EstudianteCursoModel();

        $data['asignaciones'] = $model
            ->select('
                estudiante_curso.*,
                usuario.primer_nombre,
                usuario.primer_apellido,
                curso.nombre_curso
            ')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->join('curso', 'curso.id_curso = estudiante_curso.id_curso')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('curso.colegio_id', $this->colegio_id)
            ->findAll();

        return view('admin/secciones/crud/estudianteCurso/index', $data);
    }

    public function crear()
    {
        $estudianteModel = new EstudianteModel();
        $cursoModel = new CursoModel();

        $data['estudiantes'] = $estudianteModel
            ->select('estudiante.*, usuario.primer_nombre, usuario.primer_apellido')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->findAll();

        $data['cursos'] = $cursoModel
            ->where('colegio_id', $this->colegio_id)
            ->where('estado', 'activo')
            ->findAll();

        return view('admin/secciones/crud/estudianteCurso/crear', $data);
    }

    public function guardar()
    {
        $model = new EstudianteCursoModel();

        $data = [
            'id_estudiante' => $this->request->getPost('id_estudiante'),
            'id_curso'      => $this->request->getPost('id_curso'),
            'estado'        => 'activo',
            'fecha_inscripcion' => date('Y-m-d'),
        ];

        // Validar estudiante que pertenezca al colegio
        $estudiante = model('EstudianteModel')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('estudiante.id_estudiante', $data['id_estudiante'])
            ->first();

        // Validar curso que pertenezca al colegio
        $curso = model('CursoModel')
            ->where('colegio_id', $this->colegio_id)
            ->where('id_curso', $data['id_curso'])
            ->first();

        if (!$estudiante || !$curso) {
            return redirect()->back()->with('error', 'No puedes asignar datos de otro colegio.');
        }

        // Evitar duplicados
        if ($model->existeAsignacion($data['id_estudiante'], $data['id_curso'])) {
            return redirect()->back()->with('error', 'El estudiante ya está inscrito en ese curso.');
        }

        $model->insert($data);

        return redirect()->to(base_url('/admin/asignaciones'))
                         ->with('success', 'Asignación creada correctamente.');
    }

    public function retirar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        // Validar colegio
        $validar = $model
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$validar) {
            return redirect()->back()->with('error', 'Acción no permitida.');
        }

        $model->actualizarEstadoAsignacion(
            $idEstudiante,
            $idCurso,
            'retirado'
        );

        return redirect()->back()->with('success', 'Estudiante retirado correctamente.');
    }

    public function eliminar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        // Validar colegio
        $validar = $model
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$validar) {
            return redirect()->back()->with('error', 'Acción no permitida.');
        }

        $model->retirarEstudiante($idEstudiante, $idCurso);

        return redirect()->back()->with('success', 'Asignación eliminada.');
    }
}
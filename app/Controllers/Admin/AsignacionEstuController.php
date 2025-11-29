<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EstudianteCursoModel;
use App\Models\CursoModel;
use App\Models\EstudianteModel;

class AsignacionEstuController extends BaseController 
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
                estudiante_curso.id_estudiante,
                estudiante_curso.id_curso,
                estudiante_curso.estado,
                estudiante_curso.fecha_inscripcion,
                estudiante_curso.fecha_retiro,
                usuario.primer_nombre,
                usuario.primer_apellido,
                curso.nombre_curso
            ')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario',   'usuario.id_usuario = estudiante.id_estudiante')
            ->join('curso',     'curso.id_curso = estudiante_curso.id_curso')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->findAll();

        return view('admin/secciones/crud/estudianteCurso/index', $data);
    }

    public function crear()
    {
        $estudianteModel = new EstudianteModel();
        $cursoModel = new CursoModel();

        $data = [
            // CORRECCIÓN: unir con usuario para poder filtrar por usuario.colegio_id
            'estudiantes' => $estudianteModel
                                ->select('estudiante.*, usuario.primer_nombre, usuario.primer_apellido')
                                ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
                                ->where('usuario.colegio_id', $this->colegio_id)
                                ->findAll(),

            'cursos'      => $cursoModel->where('estado', 'activo')
                                       ->where('colegio_id', $this->colegio_id)
                                       ->findAll()
        ];

        return view('admin/secciones/crud/estudianteCurso/crear', $data);
    }

    public function editar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        $registro = $model
            ->select('*')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('usuario.colegio_id', $this->colegio_id)
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$registro) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Registro no encontrado o no pertenece a tu colegio.");
        }

        $estudianteModel = new EstudianteModel();
        $cursoModel = new CursoModel();

        return view('admin/secciones/crud/estudianteCurso/editar', [
            'registro'    => $registro,

            // CORRECCIÓN: idem, unir con usuario para filtrar por colegio
            'estudiantes' => $estudianteModel
                                ->select('estudiante.*, usuario.primer_nombre, usuario.primer_apellido')
                                ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
                                ->where('usuario.colegio_id', $this->colegio_id)
                                ->findAll(),

            'cursos'      => $cursoModel->where('estado','activo')
                                       ->where('colegio_id', $this->colegio_id)
                                       ->findAll()
        ]);
    }

    public function actualizar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        // Seguridad: evitar modificar datos de otros colegios
        $validar = $model
            ->select('usuario.colegio_id')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$validar || $validar['colegio_id'] != $this->colegio_id) {
            return redirect()->back()->with('error', 'No tienes permiso para editar esta asignación.');
        }

        $data = [
            'id_estudiante' => $this->request->getPost('id_estudiante'),
            'id_curso'      => $this->request->getPost('id_curso'),
            'estado'        => $this->request->getPost('estado'),
        ];

        $model->where('id_estudiante', $idEstudiante)
              ->where('id_curso', $idCurso)
              ->set($data)
              ->update();

        return redirect()->to(base_url('/admin/asignaciones'))
                         ->with('success', 'Asignación actualizada correctamente.');
    }

    public function guardar()
    {
        $model = new EstudianteCursoModel();

        $data = [
            'id_estudiante'    => $this->request->getPost('id_estudiante'),
            'id_curso'         => $this->request->getPost('id_curso'),
            'estado'           => 'activo',
            'fecha_inscripcion'=> date('Y-m-d'),
            'fecha_retiro'     => null
        ];

        // Seguridad: validar que estudiante y curso pertenecen al colegio
        $estudiante = model('EstudianteModel')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('id_estudiante', $data['id_estudiante'])
            ->where('usuario.colegio_id', $this->colegio_id)
            ->first();

        $curso = model('CursoModel')
            ->where('id_curso', $data['id_curso'])
            ->where('colegio_id', $this->colegio_id)
            ->first();

        if (!$estudiante || !$curso) {
            return redirect()->back()->with('error', 'No tienes permiso para asignar datos de otro colegio.');
        }

        // Evitar duplicados
        $existe = $model
            ->where('id_estudiante', $data['id_estudiante'])
            ->where('id_curso', $data['id_curso'])
            ->first();

        if ($existe) {
            return redirect()->back()->with('error', 'El estudiante ya está inscrito en este curso.');
        }

        $model->insert($data);

        return redirect()->to(base_url('/admin/asignaciones'))
                         ->with('success', 'Asignación creada exitosamente.');
    }

    public function retirar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        // Seguridad
        $validar = $model
            ->select('usuario.colegio_id')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$validar || $validar['colegio_id'] != $this->colegio_id) {
            return redirect()->back()->with('error', 'No puedes editar datos de otro colegio.');
        }

        $model->where('id_estudiante', $idEstudiante)
              ->where('id_curso', $idCurso)
              ->set([
                'estado' => 'retirado',
                'fecha_retiro' => date('Y-m-d')
              ])
              ->update();

        return redirect()->to(base_url('/admin/asignaciones'))
                         ->with('success', 'Estudiante retirado del curso exitosamente.');
    }

    public function eliminar($idEstudiante, $idCurso)
    {
        $model = new EstudianteCursoModel();

        // Seguridad
        $validar = $model
            ->select('usuario.colegio_id')
            ->join('estudiante', 'estudiante.id_estudiante = estudiante_curso.id_estudiante')
            ->join('usuario', 'usuario.id_usuario = estudiante.id_estudiante')
            ->where('estudiante_curso.id_estudiante', $idEstudiante)
            ->where('estudiante_curso.id_curso', $idCurso)
            ->first();

        if (!$validar || $validar['colegio_id'] != $this->colegio_id) {
            return redirect()->back()->with('error', 'No puedes eliminar datos de otro colegio.');
        }

        $model->where('id_estudiante', $idEstudiante)
              ->where('id_curso', $idCurso)
              ->delete();

        return redirect()->to(base_url('/admin/asignaciones'))
                         ->with('success', 'Asignación eliminada correctamente.');
    }
}
<?php 
namespace App\Controllers\adminCrud;

use App\Controllers\BaseController;
use App\Models\CursoModel;

class CursoController extends BaseController 
{
    protected $cursoModel;

    public function __construct()
    {
        $this->cursoModel = new CursoModel();
    }

    public function index()
    {
        $colegio_id = session()->get('colegio_id');

        $data['titulo'] = 'Gestion de cursos';
        $data['cursos'] = $this->cursoModel->obtenerCursos($colegio_id);

        return view('admin/secciones/crud/curso/cursos', $data);
    }

    public function crear()
    {
        $data['titulo'] = 'Crear nuevo curso';
        return view('admin/secciones/crud/curso/crear', $data);
    }

    public function guardar()
    {
        $colegio_id = session()->get('colegio_id');

        $valores = [
            'colegio_id' => $colegio_id,
            'nombre_curso' => $this->request->getPost('nombre_curso'),
            'grado' => $this->request->getPost('grado'),
            'descripcion' => $this->request->getPost('descripcion'),
            'capacidad_maxima' => $this->request->getPost('capacidad_maxima'),
            'estado' => $this->request->getPost('estado'),
        ];

        $this->cursoModel->insert($valores);

        return redirect()->to(base_url('admin/cursos'))
                            ->with('success', 'Curso creado exitosamente.');
    }

    public function editar($id)
    {
        $curso = $this->cursoModel->obtenerCursoPorId($id);

        if (!$curso) {
            return redirect()->back()->with('error', 'Curso no encontrado.');
        }

        $data['titulo'] = 'Editar curso';
        $data['curso'] = $curso;

        return view('admin/secciones/crud/curso/editar', $data);
    }

    public function actualizar()
    {
        $id = $this->request->getPost('id_curso');

        $valores = [
            'nombre_curso' => $this->request->getPost('nombre_curso'),
            'grado' => $this->request->getPost('grado'),
            'descripcion' => $this->request->getPost('descripcion'),
            'capacidad_maxima' => $this->request->getPost('capacidad_maxima'),
            'estado' => $this->request->getPost('estado')
        ];

        $this->cursoModel->update($id, $valores);

        return redirect()->to(base_url('admin/cursos'))
                            ->with('success', 'Curso actualizado exitosamente.');
    }

    public function eliminar($id)
    {
        $this->cursoModel->eliminarCurso($id);

        return redirect()->to(base_url('admin/cursos'))
                            ->with('success', 'Curso eliminado exitosamente.');
    }
}
?>
<?php 
namespace App\Controllers\adminCrud;

use App\Models\ProfesorModel;
use App\Models\ColegioModel;
use CodeIgniter\Controller;

class Profesor extends Controller
{
    protected $profesorModel;
    protected $colegioModel;

    public function __construct()
    {
        $this->profesorModel = new ProfesorModel();
        $this->colegioModel = new ColegioModel();
    }

    public function index()
    {
        $colegio_id = session()->get('colegio_id');
 

        $data['profesores'] = $this->profesorModel->obtenerProfesores($colegio_id);

        echo view('admin/secciones/crud/profesor/profesores', $data);
    }

    public function crear()
    {
        $data['colegio'] = $this->colegioModel->find(session()->get('colegio_id'));

        echo view('admin/secciones/crud/profesor/crear', $data);
    }

    public function guardar()
    {
        $datos = $this->request->getPost();

        $usuarioModel = model('UsuarioModel');
        $colegio_id = session()->get('colegio_id');


        // Crear usuario
        $usuarioData = [
            'rol' => 'profesor',
            'primer_nombre' => $datos['primer_nombre'],
            'segundo_nombre' => $datos['segundo_nombre'] ?? null,
            'primer_apellido' => $datos['primer_apellido'],
            'segundo_apellido' => $datos['segundo_apellido'] ?? null,
            'tipo_documento' => $datos['tipo_documento'],
            'documento' => $datos['documento'],
            'username' => $datos['username'],
            'correo' => $datos['correo'],
            'telefono' => $datos['telefono'],
            'direccion' => $datos['direccion'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'contrasena' => password_hash('123456', PASSWORD_DEFAULT),
            'colegio_id' => $colegio_id
        ];

        $usuarioModel->insert($usuarioData);
        $id_usuario = $usuarioModel->getInsertID();

        // Crear profesor
        $this->profesorModel->insert([
            'id_profesor' => $id_usuario,
            'titulo_academico' => $datos['titulo_academico'],
            'experiencia_anios' => $datos['experiencia_anios']
        ]);

        return redirect()->to(base_url('admin/profesores'))
                ->with('success', 'Profesor creado correctamente.');
    }

    public function editar($id)
    {
        $data['profesor'] = $this->profesorModel->obtenerProfesorPorId($id);

        if (!$data['profesor']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Profesor no encontrado');
        }

        echo view('admin/secciones/crud/profesor/editar', $data);
    }

    public function actualizar($id)
    {
        $datos = $this->request->getPost();

        $usuarioData = [
            'primer_nombre' => $datos['primer_nombre'],
            'segundo_nombre' => $datos['segundo_nombre'] ?? null,
            'primer_apellido' => $datos['primer_apellido'],
            'segundo_apellido' => $datos['segundo_apellido'] ?? null,
            'tipo_documento' => $datos['tipo_documento'],
            'documento' => $datos['documento'],
            'username' => $datos['username'],
            'correo' => $datos['correo'],
            'telefono' => $datos['telefono'],
            'direccion' => $datos['direccion'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
        ];

        $profesorData = [
            'titulo_academico' => $datos['titulo_academico'],
            'experiencia_anios' => $datos['experiencia_anios']
        ];

        $resultado = $this->profesorModel->actualizarProfesorCompleto($id, $usuarioData, $profesorData);

        if (!$resultado) {
            return redirect()->back()
                    ->with('error', 'Error al actualizar el profesor.');
        }

        return redirect()->to(base_url('admin/profesores'))
                ->with('success', 'Profesor actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $resultado = $this->profesorModel->eliminarProfesor($id);

        if (!$resultado) {
            return redirect()->back()->with('error', 'Error al eliminar el profesor.');
        }

        return redirect()->to(base_url('admin/profesores'))
                ->with('success', 'Profesor eliminado correctamente.');
    }
}
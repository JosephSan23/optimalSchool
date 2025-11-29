<?php 
namespace App\Controllers\adminCrud;

use App\Models\AcudienteModel;
use App\Models\ColegioModel;
use CodeIgniter\Controller;

class Acudiente extends Controller
{
    protected $acudienteModel;
    protected $colegioModel;

    public function __construct()
    {
        $this->acudienteModel = new AcudienteModel();
        $this->colegioModel = new ColegioModel();
    }

    public function index()
    {
        $colegio_id = session()->get('colegio_id');
 

        $data['acudientes'] = $this->acudienteModel->obtenerAcudientes($colegio_id);
        echo view('admin/secciones/crud/acudiente/acudientes', $data);
    }

    public function crear()
    {
        $data['colegio'] = $this->colegioModel->find(session()->get('colegio_id'));

        echo view('admin/secciones/crud/acudiente/crear', $data);
    }

    public function guardar()
    {
        $datos = $this->request->getPost();

        $usuarioModel = model('UsuarioModel');
        $colegio_id = session()->get('colegio_id');


        // Crear usuario
        $usuarioData = [
            'rol' => 'acudiente',
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

        // Crear acudiente
        $this->acudienteModel->insert([
            'id_acudiente' => $id_usuario,
            'parentesco' => $datos['parentesco'],
        ]);

        return redirect()->to(base_url('admin/acudientes'))
                ->with('success', 'acudiente creado correctamente.');
    }

    public function editar($id)
    {
        $data['acudiente'] = $this->acudienteModel->obteneracudientePorId($id);

        if (!$data['acudiente']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('acudiente no encontrado');
        }

        echo view('admin/secciones/crud/acudiente/editar', $data);
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

        $acudienteData = [
            'parentesco' => $datos['parentesco'],
        ];

        $resultado = $this->acudienteModel->actualizarAcudienteCompleto($id, $usuarioData, $acudienteData);

        if (!$resultado) {
            return redirect()->back()
                    ->with('error', 'Error al actualizar el acudiente.');
        }

        return redirect()->to(base_url('admin/acudientes'))
                ->with('success', 'acudiente actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $resultado = $this->acudienteModel->eliminaracudiente($id);

        if (!$resultado) {
            return redirect()->back()->with('error', 'Error al eliminar el acudiente.');
        }

        return redirect()->to(base_url('admin/acudientes'))
                ->with('success', 'acudiente eliminado correctamente.');
    }
}
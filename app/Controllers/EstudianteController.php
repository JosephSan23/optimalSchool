<?php

namespace App\Controllers;

use App\Models\EstudianteModel;
use App\Models\ColegioModel;
use CodeIgniter\Controller;

class EstudianteController extends Controller
{
    protected $estudianteModel;
    protected $colegioModel;

    public function __construct()
    {
        $this->estudianteModel = new EstudianteModel();
        $this->colegioModel = new ColegioModel();
    }

    // 📘 Mostrar lista de estudiantes
    public function index()
    {
        // Puedes cambiar el ID del colegio según tu prueba
        $colegio_id = 1; 

        $data['estudiantes'] = $this->estudianteModel->obtenerEstudiantes($colegio_id);

        echo view('admin/header');
        echo view('admin/secciones/estudiantes', $data);
        // echo view('admin/footer');
    }

    // 📗 Mostrar formulario para crear estudiante
    public function crear()
    {
        $data['colegios'] = $this->colegioModel->findAll();

        echo view('admin/header');
        echo view('admin/secciones/crear_estudiante', $data);
        // echo view('admin/footer');
    }

    // 📕 Guardar nuevo estudiante
    public function guardar()
    {
        $datos = $this->request->getPost();

        $usuarioModel = model('UsuarioModel'); // Usa tu modelo de Usuario si ya existe

        $colegio_id = 1;

        // Crear usuario
        $usuarioData = [
            'rol' => 'estudiante',
            'primer_nombre' => $datos['primer_nombre'],
            'segundo_nombre' => $datos['segundo_nombre'] ?? null,
            'primer_apellido' => $datos['primer_apellido'],
            'segundo_apellido' => $datos['segundo_apellido'] ?? null,
            'tipo_documento' => $datos['tipo_documento'],
            'documento' => $datos['documento'],
            'correo' => $datos['correo'],
            'telefono' => $datos['telefono'],
            'direccion' => $datos['direccion'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'contrasena' => password_hash('123456', PASSWORD_DEFAULT),
            'colegio_id' => $colegio_id
        ];

        $usuarioModel->insert($usuarioData);
        $id_usuario = $usuarioModel->getInsertID();

        // Crear estudiante
        $this->estudianteModel->insert([
            'id_estudiante' => $id_usuario,
            'fecha_ingreso' => $datos['fecha_ingreso'],
            'estado' => $datos['estado']
        ]);

        return redirect()->to(base_url('admin/estudiantes'))->with('success', 'Estudiante creado correctamente.');
    }

    // 📙 Eliminar estudiante
    public function eliminar($id)
    {
        $this->estudianteModel->delete($id);
        return redirect()->to(base_url('admin/estudiantes'))->with('success', 'Estudiante eliminado correctamente.');
    }
}
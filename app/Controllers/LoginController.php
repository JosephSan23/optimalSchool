<?php 
namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class LoginController extends Controller 
{
    public function index()
    {
        return view('login');
    }

    public function autenticar()
    {
        $session = session();
        $usuarioModel = new UsuarioModel();

        $correoUsuario = $this->request->getPost('correo_usuario');
        $password = $this->request->getPost('contrasena');
        $colegio = $this->request->getPost('colegio');

        // Buscar usuario por correo o username
        $usuario = $usuarioModel
            ->groupStart()
                ->where('correo', $correoUsuario)
                ->orWhere('username', $correoUsuario)
            ->groupEnd()
            ->first();

        if (!$usuario) {
            return redirect()->to('/login')->with('error', 'Usuario no encontrado.');
        }

        // Contraseña sin encriptar
        if ($password !== $usuario['contrasena']) {
            return redirect()->to('/login')->with('error', 'Contraseña incorrecta.');
        }
        
        // Verificar colegio
        if ($usuario['colegio_id'] != $colegio) {
            return redirect()->to('/login')->with('error', 'No pertenece a este colegio.');
        }

        // Crear sesión
        $sessionData = [
            'id_usuario' => $usuario['id_usuario'],
            'nombre' => $usuario['primer_nombre']. ' ' . $usuario['primer_apellido'],
            'rol' => $usuario['rol'],
            'colegio_id' => $usuario['colegio_id'],
            'logueado' => true
        ];

        $session->set($sessionData);

        // Redirigir según rol
        switch ($usuario['rol']) {
            case 'administrador':
                return redirect()->to('/admin');
            case 'profesor':
                return redirect()->to('/profesor');
            case 'estudiante':
                return redirect()->to('/estudiante');
            case 'acudiente':
                return redirect()->to('/acudiente');
            default:
                return redirect()->to('/login')->with('error', 'Rol no reconocido.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
?>
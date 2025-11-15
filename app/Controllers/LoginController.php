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
        $rol = $this->request->getPost('rol');
        $colegio = $this->request->getPost('colegio');

        // Buscar el usuario por correo o nombre de usuario
        $usuario = $usuarioModel
            ->groupStart()
                ->where('correo', $correoUsuario)
                ->orWhere('usuario', $correoUsuario)
            ->groupEnd()
            ->first();

        if (!$usuario) 
        {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // verificar contraseña
        if(!password_verify($password, $usuario['contrasena'])) {
            return redirect()->back()->with('error', 'Contraseña incorrecta.');
        }

        // verificar rol
        if($usuario['rol'] !== $rol)
        {
            return redirect()->back()->with('error', 'El rol seleccionado no coincide');
        }

        if($usuario['colegio'] !== $colegio)
        {
            return redirect()->back()->with('error', 'No pertenece a este colegio');
        }

        // crear sesion
        $sessionData = [
            'id_usuario' => $usuario['id_usuario'],
            'nombre' => $usuario['primer_nombre'],
            'rol' => $usuario['rol'],
            'colegio_id' => $usuario['colegio_id'],
            'logueado' => true
        ];

        $session->set($sessionData);
        
        // Redirigir segun rol
        switch ($usuario['rol']) {
            case 'admin':
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
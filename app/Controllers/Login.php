<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        return view('/login');
    }

    public function acceder()
    {
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $model = new UsuarioModel();
        $datosUsuario = $model->VerificarUsuario($usuario, $password);

        if ($datosUsuario)
        {
            //guardar datos en la variable session
            session()->set('usuario',$datosUsuario['nombre_usu']);
            session()->set('perfil',$datosUsuario['id_perfil']);
            //redireccion segun el perfil
            switch($datosUsuario['id_perfil'])
            {
                case 1:
                    return redirect()->to('/empleados');
                case 2:
                    
                    return redirect()->to('/secretaria');
                case 3:
                    return redirect()->to('/vendedor');
                default:
                    return redirect()->to('/login');
            }
        }else{
            return redirect()->back()->with('mensaje',
            'Nombre de usuario y/o contraseña incorrecta');
        }        
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
?>
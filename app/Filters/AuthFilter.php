<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface 
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        if(!$session->get('logueado')) 
        {
            return redirect()->to(base_url('/login'));
        }

        if($arguments && !in_array($session->get('rol'), $arguments)) {
            switch($session->get('rol')) 
            {
                case 'administrador': return redirect()->to(base_url('/admin'));
                case 'estudiante': return redirect()->to(base_url('/estudiante'));
                case 'profesor': return redirect()->to(base_url('/profesor'));
                case 'acudiente': return redirect()->to(base_url('/acudiente'));
            
            }

            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nada aquí
    }
}

?>
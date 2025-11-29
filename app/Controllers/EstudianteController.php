<?php 
namespace App\Controllers;
use App\Controllers\BaseController;

class EstudianteController extends BaseController 
{
    public function __construct()
    {
        if (!session()->get('logueado'))
            {
                redirect()->to('/login')->send();
                exit;
            };
    }
    public function index()
    {
        return view('estudiante/layout');
    }
}
?>
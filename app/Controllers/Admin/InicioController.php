<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class InicioController extends BaseController
{
    public function index()
    {
        return view('admin/secciones/inicio/inicio');
    }
}

?>
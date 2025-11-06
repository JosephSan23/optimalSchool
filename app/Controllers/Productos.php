<?php
namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT codigo_barra, nombre_pro, stock_pro FROM producto;");
        $resultado =$query->getResult();
        $data =['productos' => $resultado];
        return view('producto/productos', $data);
    }

    public function agregar()
    {
        return view('producto/agregar');
    }
}
?>
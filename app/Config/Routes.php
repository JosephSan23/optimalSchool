<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin','Administrador::index');


$routes->get('/productos/agregar','Productos::agregar');

$routes->get('/empleados','Empleados::index');
$routes->get('/empleados/crear','Empleados::crear');
$routes->post('/empleados/guardar','Empleados::guardar');
$routes->get('/empleados/editar/(:num)','Empleados::editar/$1');
$routes->post('/empleados/actualizar/(:num)','Empleados::actualizar/$1');
$routes->get('/empleados/eliminar/(:num)','Empleados::eliminar/$1');

$routes->get('/login','Login::index');
$routes->post('/login/acceder','Login::acceder');
$routes->get('/logout','Login::salir');
$routes->get('/secretaria','Empleados::secretaria');
$routes->get('/vendedor','Empleados::vendedor');
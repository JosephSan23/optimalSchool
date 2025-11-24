<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::autenticar');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/admin','Administrador::index');
$routes->get('/profesor', 'ProfesorController::index');
$routes->get('/estudiante', 'Estudiante::index');
$routes->get('/acudiente', 'AcudienteController::index');





$routes->get('/admin/estudiantes', 'EstudianteController::index');
// Estudiantes CRUD
$routes->get('/admin/estudiantes/crear', 'EstudianteController::crear');
$routes->post('/admin/estudiantes/guardar', 'EstudianteController::guardar');
$routes->get('/admin/estudiantes/editar/(:num)', 'EstudianteController::editar/$1');
$routes->post('/admin/estudiantes/actualizar/(:num)', 'EstudianteController::actualizar/$1');
$routes->get('/admin/estudiantes/eliminar/(:num)', 'EstudianteController::eliminar/$1');


$routes->get('/admin/profesores', 'adminCrud\Profesor::index');
// profesores CRUD
$routes->get('/admin/profesores/crear', 'adminCrud\Profesor::crear');
$routes->post('/admin/profesores/guardar', 'adminCrud\Profesor::guardar');
$routes->get('/admin/profesores/editar/(:num)', 'adminCrud\Profesor::editar/$1');
$routes->post('/admin/profesores/actualizar/(:num)', 'adminCrud\Profesor::actualizar/$1');
$routes->get('/admin/profesores/eliminar/(:num)', 'adminCrud\Profesor::eliminar/$1');

$routes->get('/admin/acudientes', 'adminCrud\Acudiente::index');
// acudientes CRUD
$routes->get('/admin/acudientes/crear', 'adminCrud\Acudiente::crear');
$routes->post('/admin/acudientes/guardar', 'adminCrud\Acudiente::guardar');
$routes->get('/admin/acudientes/editar/(:num)', 'adminCrud\Acudiente::editar/$1');
$routes->post('/admin/acudientes/actualizar/(:num)', 'adminCrud\Acudiente::actualizar/$1');
$routes->get('/admin/acudientes/eliminar/(:num)', 'adminCrud\Acudiente::eliminar/$1');
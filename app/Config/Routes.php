<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/login', 'LoginController::index');
$routes->post('login/autenticar', 'LoginController::autenticar');
$routes->get('/logout', 'LoginController::logout');

$routes->get('/admin','Administrador::index');
$routes->get('/profesor', 'ProfesorController::index');
$routes->get('/estudiante', 'EstudianteController::dashboard');
$routes->get('/acudiente', 'AcudienteController::index');





$routes->get('/admin/estudiantes', 'EstudianteController::index');
// Estudiantes CRUD
$routes->get('/admin/estudiantes/crear', 'EstudianteController::crear');
$routes->post('/admin/estudiantes/guardar', 'EstudianteController::guardar');
$routes->get('/admin/estudiantes/editar/(:num)', 'EstudianteController::editar/$1');
$routes->post('/admin/estudiantes/actualizar/(:num)', 'EstudianteController::actualizar/$1');
$routes->get('/admin/estudiantes/eliminar/(:num)', 'EstudianteController::eliminar/$1');
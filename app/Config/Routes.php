<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->get('/admin','Administrador::index');

// Mostrar listado de estudiantes
$routes->get('/admin/estudiantes', 'EstudianteController::index');

// Crear nuevo estudiante (formulario)
$routes->get('/admin/estudiantes/crear', 'EstudianteController::crear');

// Guardar estudiante (al enviar el formulario)
$routes->post('/admin/estudiantes/guardar', 'EstudianteController::guardar');

// Editar estudiante
$routes->get('/admin/estudiantes/editar/(:num)', 'EstudianteController::editar/$1');

// Actualizar estudiante (cuando se edita)
$routes->post('/admin/estudiantes/actualizar/(:num)', 'EstudianteController::actualizar/$1');

// Eliminar estudiante
$routes->get('/admin/estudiantes/eliminar/(:num)', 'EstudianteController::eliminar/$1');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// LOGIN
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::autenticar');
$routes->get('/logout', 'LoginController::logout');

// DASHBOARDS
$routes->get('/admin', 'Administrador::index', ['filter' => 'auth:administrador']);
$routes->get('/profesor', 'ProfesorController::index', ['filter' => 'auth:profesor']);
$routes->get('/estudiante', 'EstudianteController::index', ['filter' => 'auth:estudiante']);
$routes->get('/acudiente', 'AcudienteController::index', ['filter' => 'auth:acudiente']);


//Rutas administrador con filtro de autenticación
$routes->group('admin', ['filter' => 'auth:administrador'], function($routes) {

    // Estudiantes CRUD
    $routes->get('estudiantes', 'adminCrud\Estudiante::index');
    $routes->get('estudiantes/crear', 'adminCrud\Estudiante::crear');
    $routes->post('estudiantes/guardar', 'adminCrud\Estudiante::guardar');
    $routes->get('estudiantes/editar/(:num)', 'adminCrud\Estudiante::editar/$1');
    $routes->post('estudiantes/actualizar/(:num)', 'adminCrud\Estudiante::actualizar/$1');
    $routes->get('estudiantes/eliminar/(:num)', 'adminCrud\Estudiante::eliminar/$1');

    // Profesores CRUD
    $routes->get('profesores', 'adminCrud\Profesor::index');
    $routes->get('profesores/crear', 'adminCrud\Profesor::crear');
    $routes->post('profesores/guardar', 'adminCrud\Profesor::guardar');
    $routes->get('profesores/editar/(:num)', 'adminCrud\Profesor::editar/$1');
    $routes->post('profesores/actualizar/(:num)', 'adminCrud\Profesor::actualizar/$1');
    $routes->get('profesores/eliminar/(:num)', 'adminCrud\Profesor::eliminar/$1');

    // Acudientes CRUD
    $routes->get('acudientes', 'adminCrud\Acudiente::index');
    $routes->get('acudientes/crear', 'adminCrud\Acudiente::crear');
    $routes->post('acudientes/guardar', 'adminCrud\Acudiente::guardar');
    $routes->get('acudientes/editar/(:num)', 'adminCrud\Acudiente::editar/$1');
    $routes->post('acudientes/actualizar/(:num)', 'adminCrud\Acudiente::actualizar/$1');
    $routes->get('acudientes/eliminar/(:num)', 'adminCrud\Acudiente::eliminar/$1');

    // Cursos CRUD
    $routes->get('cursos', 'adminCrud\CursoController::index');
    $routes->get('cursos/crear', 'adminCrud\CursoController::crear');
    $routes->post('cursos/guardar', 'adminCrud\CursoController::guardar');
    $routes->get('cursos/editar/(:num)', 'adminCrud\CursoController::editar/$1');
    $routes->post('cursos/actualizar/(:num)', 'adminCrud\CursoController::actualizar/$1');
    $routes->get('cursos/eliminar/(:num)', 'adminCrud\CursoController::eliminar/$1');

    // Reportes
    $routes->get('reportes', 'Admin\ReportesController::index');
    $routes->get('reportes/exportarE', 'Admin\ReportesController::exportarEstudiantes');
    $routes->get('reportes/exportarP', 'Admin\ReportesController::exportarProfesores');
    $routes->get('reportes/exportarA', 'Admin\ReportesController::exportarAcudientes');

    // Asignaciones
    $routes->get('asignaciones', 'Admin\AsignacionEstuController::index');
    $routes->get('asignaciones/crear', 'Admin\AsignacionEstuController::crear');
    $routes->post('asignaciones/guardar', 'Admin\AsignacionEstuController::guardar');

    $routes->get('asignaciones/editar/(:num)/(:num)', 'Admin\AsignacionEstuController::editar/$1/$2');
    $routes->post('asignaciones/actualizar/(:num)/(:num)', 'Admin\AsignacionEstuController::actualizar/$1/$2');

    $routes->get('asignaciones/eliminar/(:num)/(:num)', 'Admin\AsignacionEstuController::eliminar/$1/$2');

});

$routes->get('estudiante/cursos', 'Estudiante\CursoController::index');
$routes->get('estudiante/asignaturas', 'Estudiante\AsignaturaController::index');
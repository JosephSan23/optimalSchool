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
$routes->get('/estudiante', 'EstudianteController::index');
$routes->get('/acudiente', 'AcudienteController::index');





$routes->get('/admin/estudiantes', 'adminCrud\Estudiante::index');
// Estudiantes CRUD
$routes->get('/admin/estudiantes/crear', 'adminCrud\Estudiante::crear');
$routes->post('/admin/estudiantes/guardar', 'adminCrud\Estudiante::guardar');
$routes->get('/admin/estudiantes/editar/(:num)', 'adminCrud\Estudiante::editar/$1');
$routes->post('/admin/estudiantes/actualizar/(:num)', 'adminCrud\Estudiante::actualizar/$1');
$routes->get('/admin/estudiantes/eliminar/(:num)', 'adminCrud\Estudiante::eliminar/$1');


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

$routes->get('/admin/cursos', 'adminCrud\CursoController::index');
// cursos CRUD
$routes->get('/admin/cursos/crear', 'adminCrud\CursoController::crear');
$routes->post('/admin/cursos/guardar', 'adminCrud\CursoController::guardar');
$routes->get('/admin/cursos/editar/(:num)', 'adminCrud\CursoController::editar/$1');
$routes->post('/admin/cursos/actualizar/', 'adminCrud\CursoController::actualizar/$1');
$routes->get('/admin/cursos/eliminar/(:num)', 'adminCrud\CursoController::eliminar/$1');


$routes->get('admin/reportes', 'Admin\ReportesController::index');
$routes->get('admin/reportes/exportarE', 'Admin\ReportesController::exportarEstudiantes');
$routes->get('admin/reportes/exportarP', 'Admin\ReportesController::exportarProfesores');
$routes->get('admin/reportes/exportarA', 'Admin\ReportesController::exportarAcudientes');

// Secciones de Asignación Estudiante-Curso
$routes->get('admin/asignaciones', 'Admin\AsignacionEstuController::index');
$routes->get('admin/asignaciones/crear', 'Admin\AsignacionEstuController::crear');
$routes->post('admin/asignaciones/guardar', 'Admin\AsignacionEstuController::guardar');

$routes->get('admin/asignaciones/editar/(:num)/(:num)', 'Admin\AsignacionEstuController::editar/$1/$2');
$routes->post('admin/asignaciones/actualizar/(:num)/(:num)', 'Admin\AsignacionEstuController::actualizar/$1/$2');

$routes->get('admin/asignaciones/eliminar/(:num)/(:num)', 'Admin\AsignacionEstuController::eliminar/$1/$2');
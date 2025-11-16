<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrador</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/adminDash.css') ?>">
</head>

<body class="dash-admin">
    <header class="dash-header">
        <h1 class="titulo dash">Panel del Administrador</h1>
        <div class="usuario-info">
            <span>Admin: Juan Pérez</span>
            <a href="<?php echo base_url('logout') ?>" class="btn-logout">Cerrar Sesión</a>
        </div>
    </header>

    <div class="dash-contenedor">
        <aside class="dash-sidebar">
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('admin') ?>">Inicio</a></li>
                    <li><a href="#">Postulantes</a></li>
                    <li><a href="<?php echo base_url('admin/estudiantes') ?>">Estudiantes</a></li>
                    <li><a href="#">Profesores</a></li>
                    <li><a href="#">Acudientes</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li><a href="#">Reportes</a></li>
                    <li><a href="#">Configuración</a></li>
                </ul>
            </nav>
        </aside>

        <main class="dash-main"></main>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador</title>

    <!-- CSS del dashboard -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/adminDash.css') ?>">
</head>

<body>

    <header class="dash-header">

        <div class="brand">
            <img src="<?= base_url('assets/img/logoOptimalSchool-sinFondo.png') ?>" alt="Logo" class="brand-logo">
            <h2 class="admin-title">School Manager</h2>
        </div>

        <div class="usuario-info">
            <img src="<?= base_url('assets/img/user.png') ?>" class="avatar" alt="avatar">

            <div class="user-text">
                <span>Juan Pérez</span>
                <small>Administrador</small>
            </div>

            <a href="<?= base_url('logout') ?>" class="btn-logout">Salir</a>
        </div>

    </header>

</body>

</html>
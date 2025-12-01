<header class="dash-header">

    <div class="brand">
        <img src="<?= base_url('assets/img/logoOptimalSchool-sinFondo.png') ?>" alt="Logo" class="brand-logo">
        <h2 class="admin-title">Bienvenido</h2>
    </div>

    <div class="usuario-info">

        <div class="user-text">
            <span><strong><?= session()->get('nombre') ?></strong></span>
            <small><?= ucfirst(session()->get('rol')) ?></small>
        </div>

        <a href="<?= base_url('logout') ?>" class="btn-logout">Cerrar Sesion</a>
    </div>

</header>
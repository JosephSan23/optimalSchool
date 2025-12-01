<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css?v=' . time()) ?>">
</head>

<body>
    <div class="login-container">

        <div class="login-image">
        </div>
        <div class="login-box">
            <div class="login-content">
                <h2>Iniciar Sesión</h2>

                <form method="post" action="<?php echo base_url('login') ?>">

                    <?php if(session()->getFlashdata('error')): ?>
                    <div class="alerta-error">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                    <?php endif; ?>

                    <!-- EMAIL -->
                    <label for="email">Correo Electrónico</label>
                    <div class="input-group">
                        <img src="<?php echo base_url('assets/img/home/log/usuario.png') ?>" class="input-icon">
                        <input type="text" id="email" name="correo_usuario" placeholder="Ingresa tu correo/usuario"
                            required>
                    </div>

                    <!-- PASSWORD -->
                    <label for="password">Contraseña</label>
                    <div class="input-group">
                        <img src="<?php echo base_url('assets/img/home/log/candado.png') ?>" class="input-icon">
                        <input type="password" id="password" name="contrasena" placeholder="Ingresa tu contraseña"
                            required>
                    </div>

                    <!-- <div class="row-inputs">
                        <div class="input-group">
                            <label for="colegio">Colegio</label>
                            <select id="colegio" name="colegio" required>
                                <option value="">Selecciona tu colegio</option>
                                <option value="1">San Gabriel</option>
                                <option value="2">La Poli</option>
                                <option value="3">La Salle</option>
                            </select>
                        </div>

                    </div> -->

                    <div class="btn-wrapper">
                        <button type="submit">Iniciar sesión</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</body>

</html>
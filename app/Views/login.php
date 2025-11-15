<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css') ?>">
</head>

<body>
    <div class="login-container">
        <!-- Sección izquierda con imagen -->
        <div class="login-image">
        </div>

        <!-- Sección derecha con formulario -->
        <div class="login-box">
            <div class="login-content">
                <h2>Iniciar Sesión</h2>

                <form>
                    <label for="email">Correo Electrónico</label>
                    <input type="text" id="email" placeholder="Ingresa tu correo/usuario">

                    <label for="password">Contraseña</label>
                    <input type="password" id="password" placeholder="Ingresa tu contraseña">

                    <!-- Contenedor conjunto Rol + Colegio -->
                    <div class="row-inputs">
                        <div class="input-group">
                            <label for="rol">Rol</label>
                            <select id="rol">
                                <option value="">Selecciona tu rol</option>
                                <option value="admin">Administrador</option>
                                <option value="profesor">Profesor</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="acudiente">Acudiente</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="colegio">Colegio</label>
                            <select id="colegio">
                                <option value="">Selecciona tu colegio</option>
                                <option value="1">San Gabriel</option>
                                <option value="2">Los Pinos</option>
                                <option value="3">La Salle</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
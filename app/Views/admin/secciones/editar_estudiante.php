<?= $this->include('admin/header'); ?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background-color: #f5f5f5;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    padding: 40px 0;
}

.container {
    background-color: white;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 700px;
}

h1 {
    text-align: center;
    color: #8b0000;
    margin-bottom: 25px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input,
select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
}

input:focus,
select:focus {
    border-color: #8b0000;
    outline: none;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
}

.btn-guardar,
.btn-cancelar {
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: bold;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
    text-align: center;
}

.btn-guardar {
    background-color: #8b0000;
    color: white;
    border: none;
}

.btn-guardar:hover {
    background-color: #a50000;
}

.btn-cancelar {
    background-color: #ccc;
    color: #333;
}

.btn-cancelar:hover {
    background-color: #bbb;
}
</style>
</head>

<body>
    <div class="container">
        <h1>Editar Estudiante</h1>

        <form action="<?= base_url('admin/estudiantes/actualizar/' . $estudiante['id_usuario']) ?>" method="post"
            class="formulario">
            <input type="hidden" name="id_usuario" value="<?= $estudiante['id_usuario'] ?>">

            <div class="form-group">
                <label for="primer_nombre">Primer Nombre:</label>
                <input type="text" name="primer_nombre" id="primer_nombre"
                    value="<?= esc($estudiante['primer_nombre']) ?>" required>
            </div>

            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" id="segundo_nombre"
                    value="<?= esc($estudiante['segundo_nombre']) ?>">
            </div>

            <div class="form-group">
                <label for="primer_apellido">Primer Apellido:</label>
                <input type="text" name="primer_apellido" id="primer_apellido"
                    value="<?= esc($estudiante['primer_apellido']) ?>" required>
            </div>

            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" id="segundo_apellido"
                    value="<?= esc($estudiante['segundo_apellido']) ?>">
            </div>

            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select name="tipo_documento" id="tipo_documento" required>
                    <option value="CC" <?= $estudiante['tipo_documento'] == 'CC' ? 'selected' : '' ?>>Cédula de
                        Ciudadanía</option>
                    <option value="TI" <?= $estudiante['tipo_documento'] == 'TI' ? 'selected' : '' ?>>Tarjeta de
                        Identidad</option>
                    <option value="CE" <?= $estudiante['tipo_documento'] == 'CE' ? 'selected' : '' ?>>Cédula de
                        Extranjería</option>
                </select>
            </div>

            <div class="form-group">
                <label for="documento">Número de Documento:</label>
                <input type="text" name="documento" id="documento" value="<?= esc($estudiante['documento']) ?>"
                    required>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" value="<?= esc($estudiante['correo']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="<?= esc($estudiante['telefono']) ?>">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?= esc($estudiante['direccion']) ?>">
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                    value="<?= esc($estudiante['fecha_nacimiento']) ?>">
            </div>

            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso"
                    value="<?= esc($estudiante['fecha_ingreso']) ?>">
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" required>
                    <option value="activo" <?= $estudiante['estado'] == 'activo' ? 'selected' : '' ?>>Activo</option>
                    <option value="inactivo" <?= $estudiante['estado'] == 'inactivo' ? 'selected' : '' ?>>Inactivo
                    </option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-guardar">Actualizar</button>
                <a href="<?= base_url('admin/estudiantes') ?>" class="btn-cancelar">Cancelar</a>
            </div>
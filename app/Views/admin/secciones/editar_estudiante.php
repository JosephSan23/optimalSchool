<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Editar Estudiante</h2>
    <hr class="linea">

    <form action="<?= base_url('admin/estudiantes/actualizar/' . $estudiante['id_usuario']) ?>" method="post"
        class="formulario">

        <input type="hidden" name="id_usuario" value="<?= $estudiante['id_usuario'] ?>">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Primer Nombre:</label>
                <input type="text" name="primer_nombre" value="<?= esc($estudiante['primer_nombre']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" value="<?= esc($estudiante['segundo_nombre']) ?>">
            </div>

            <div class="form-grupo">
                <label>Primer Apellido:</label>
                <input type="text" name="primer_apellido" value="<?= esc($estudiante['primer_apellido']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" value="<?= esc($estudiante['segundo_apellido']) ?>">
            </div>

            <div class="form-grupo">
                <label>Tipo de Documento:</label>
                <select name="tipo_documento" required>
                    <option value="CC" <?= $estudiante['tipo_documento']=='CC'?'selected':'' ?>>Cédula</option>
                    <option value="TI" <?= $estudiante['tipo_documento']=='TI'?'selected':'' ?>>TI</option>
                    <option value="CE" <?= $estudiante['tipo_documento']=='CE'?'selected':'' ?>>CE</option>
                </select>
            </div>

            <div class="form-grupo">
                <label>Número Documento:</label>
                <input type="text" name="documento" value="<?= esc($estudiante['documento']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Usuario:</label>
                <input type="text" name="username" value="<?= esc($estudiante['username']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Correo:</label>
                <input type="email" name="correo" value="<?= esc($estudiante['correo']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?= esc($estudiante['telefono']) ?>">
            </div>

            <div class="form-grupo">
                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= esc($estudiante['direccion']) ?>">
            </div>

            <div class="form-grupo">
                <label>Fecha Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="<?= esc($estudiante['fecha_nacimiento']) ?>">
            </div>

            <div class="form-grupo">
                <label>Fecha Ingreso:</label>
                <input type="date" name="fecha_ingreso" value="<?= esc($estudiante['fecha_ingreso']) ?>">
            </div>

            <div class="form-grupo">
                <label>Estado:</label>
                <select name="estado">
                    <option value="activo" <?= $estudiante['estado']=='activo'?'selected':'' ?>>Activo</option>
                    <option value="inactivo" <?= $estudiante['estado']=='inactivo'?'selected':'' ?>>Inactivo</option>
                </select>
            </div>

            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Actualizar</button>
            </div>


        </div>

    </form>
</div>

<?= $this->endSection() ?>
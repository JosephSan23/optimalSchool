<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Editar acudiente</h2>
    <hr class="linea">

    <form action="<?= base_url('admin/acudientes/actualizar/' . $acudiente['id_usuario']) ?>" method="post"
        class="formulario">

        <input type="hidden" name="id_usuario" value="<?= $acudiente['id_usuario'] ?>">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Primer Nombre:</label>
                <input type="text" name="primer_nombre" value="<?= esc($acudiente['primer_nombre']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" value="<?= esc($acudiente['segundo_nombre']) ?>">
            </div>

            <div class="form-grupo">
                <label>Primer Apellido:</label>
                <input type="text" name="primer_apellido" value="<?= esc($acudiente['primer_apellido']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" value="<?= esc($acudiente['segundo_apellido']) ?>">
            </div>

            <div class="form-grupo">
                <label>Tipo de Documento:</label>
                <select name="tipo_documento" required>
                    <option value="CC" <?= $acudiente['tipo_documento']=='CC'?'selected':'' ?>>Cédula</option>
                    <option value="TI" <?= $acudiente['tipo_documento']=='TI'?'selected':'' ?>>TI</option>
                    <option value="CE" <?= $acudiente['tipo_documento']=='CE'?'selected':'' ?>>CE</option>
                    <option value="PA" <?= $acudiente['tipo_documento']=='PA'?'selected':'' ?>>Pasaporte</option>
                </select>
            </div>

            <div class="form-grupo">
                <label>Número Documento:</label>
                <input type="text" name="documento" value="<?= esc($acudiente['documento']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Usuario:</label>
                <input type="text" name="username" value="<?= esc($acudiente['username']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Correo:</label>
                <input type="email" name="correo" value="<?= esc($acudiente['correo']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?= esc($acudiente['telefono']) ?>">
            </div>

            <div class="form-grupo">
                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= esc($acudiente['direccion']) ?>">
            </div>

            <div class="form-grupo">
                <label>Fecha Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="<?= esc($acudiente['fecha_nacimiento']) ?>">
            </div>

            <div class="form-grupo">
                <label>Parentesco:</label>
                <select name="parentesco" required>
                    <option value="madre" <?= $acudiente['parentesco']=='madre'?'selected':'' ?>>Madre</option>
                    <option value="padre" <?= $acudiente['parentesco']=='padre'?'selected':'' ?>>Padre</option>
                    <option value="tutor" <?= $acudiente['parentesco']=='tutor'?'selected':'' ?>>Tutor</option>
                    <option value="otro" <?= $acudiente['parentesco']=='otro'?'selected':'' ?>>Otro</option>
                </select>
            </div>




            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Actualizar</button>
            </div>

        </div>

    </form>
</div>

<?= $this->endSection() ?>
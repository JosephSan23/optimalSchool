<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Editar Profesor</h2>
    <hr class="linea">

    <form action="<?= base_url('admin/profesores/actualizar/' . $profesor['id_usuario']) ?>" method="post"
        class="formulario">

        <input type="hidden" name="id_usuario" value="<?= $profesor['id_usuario'] ?>">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Primer Nombre:</label>
                <input type="text" name="primer_nombre" value="<?= esc($profesor['primer_nombre']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Nombre:</label>
                <input type="text" name="segundo_nombre" value="<?= esc($profesor['segundo_nombre']) ?>">
            </div>

            <div class="form-grupo">
                <label>Primer Apellido:</label>
                <input type="text" name="primer_apellido" value="<?= esc($profesor['primer_apellido']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Segundo Apellido:</label>
                <input type="text" name="segundo_apellido" value="<?= esc($profesor['segundo_apellido']) ?>">
            </div>

            <div class="form-grupo">
                <label>Tipo de Documento:</label>
                <select name="tipo_documento" required>
                    <option value="CC" <?= $profesor['tipo_documento']=='CC'?'selected':'' ?>>Cédula</option>
                    <option value="TI" <?= $profesor['tipo_documento']=='TI'?'selected':'' ?>>TI</option>
                    <option value="CE" <?= $profesor['tipo_documento']=='CE'?'selected':'' ?>>CE</option>
                    <option value="PA" <?= $profesor['tipo_documento']=='PA'?'selected':'' ?>>Pasaporte</option>
                </select>
            </div>

            <div class="form-grupo">
                <label>Número Documento:</label>
                <input type="number" name="documento" value="<?= esc($profesor['documento']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Usuario:</label>
                <input type="text" name="username" value="<?= esc($profesor['username']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Correo:</label>
                <input type="email" name="correo" value="<?= esc($profesor['correo']) ?>" required>
            </div>

            <div class="form-grupo">
                <label>Teléfono:</label>
                <input type="text" name="telefono" value="<?= esc($profesor['telefono']) ?>">
            </div>

            <div class="form-grupo">
                <label>Dirección:</label>
                <input type="text" name="direccion" value="<?= esc($profesor['direccion']) ?>">
            </div>

            <div class="form-grupo">
                <label>Fecha Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" value="<?= esc($profesor['fecha_nacimiento']) ?>">
            </div>

            <div class="form-grupo">
                <label>Titulo Academico:</label>
                <input type="text" name="titulo_academico" value="<?= esc($profesor['titulo_academico']) ?>">
            </div>

            <div class="form-grupo">
                <label>Experiencia en Años:</label>
                <input type="number" name="experiencia_anios" value="<?= esc($profesor['experiencia_anios']) ?>">
            </div>



            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Actualizar</button>
            </div>

        </div>

    </form>
</div>

<?= $this->endSection() ?>
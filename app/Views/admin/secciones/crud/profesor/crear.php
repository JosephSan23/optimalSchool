<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Agregar Profesores</h2>
    <hr class="linea">

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/profesores/guardar'); ?>" method="post" class="formulario">

        <div class="grid-2">
            <div class="form-grupo">
                <label>Primer nombre:</label>
                <input type="text" name="primer_nombre" required>
            </div>

            <div class="form-grupo">
                <label>Segundo nombre:</label>
                <input type="text" name="segundo_nombre">
            </div>

            <div class="form-grupo">
                <label>Primer apellido:</label>
                <input type="text" name="primer_apellido" required>
            </div>

            <div class="form-grupo">
                <label>Segundo apellido:</label>
                <input type="text" name="segundo_apellido">
            </div>

            <div class="form-grupo">
                <label>Tipo de documento:</label>
                <select name="tipo_documento" required>
                    <option value="CC">Cédula</option>
                    <option value="TI">Tarjeta de Identidad</option>
                    <option value="CE">Cédula Extranjera</option>
                    <option value="PA">Pasaporte</option>
                </select>
            </div>

            <div class="form-grupo">
                <label>Número de documento:</label>
                <input type="number" name="documento" required>
            </div>

            <div class="form-grupo">
                <label>Usuario:</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-grupo">
                <label>Correo:</label>
                <input type="email" name="correo" required>
            </div>

            <div class="form-grupo">
                <label>Teléfono:</label>
                <input type="text" name="telefono">
            </div>

            <div class="form-grupo">
                <label>Dirección:</label>
                <input type="text" name="direccion">
            </div>

            <div class="form-grupo">
                <label>Fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento">
            </div>

            <div class="form-grupo">
                <label>Titulo academico:</label>
                <input type="text" name="titulo_academico">
            </div>

            <div class="form-grupo">
                <label>Experiencia en años:</label>
                <input type="number" name="experiencia_anios">
            </div>

            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Guardar Profesor</button>
            </div>
        </div>


    </form>
</div>

<?= $this->endSection() ?>
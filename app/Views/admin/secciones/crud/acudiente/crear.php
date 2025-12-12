<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Agregar acudientes</h2>
    <hr class="linea">

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/acudientes/guardar'); ?>" method="post" class="formulario">

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
                <label>Parentesco:</label>
                <select name="parentesco" required>
                    <option value="madre">Madre</option>
                    <option value="padre">Padre</option>
                    <option value="tutor">Tutor</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Guardar Acudiente</button>
            </div>
        </div>


    </form>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
validarFecha(
    "fecha_nacimiento",
    "1970-01-01",
    "2020-12-31",
    "La fecha de nacimiento no está dentro del rango permitido"
);
</script>
<?= $this->endSection() ?>
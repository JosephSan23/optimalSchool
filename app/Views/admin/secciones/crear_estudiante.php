<?= $this->include('admin/header'); ?>

<div class="dash-main">
    <h2>Agregar Estudiante</h2>
    <hr style="margin: 15px 0;">

    <?php if (session()->getFlashdata('error')): ?>
    <div style="color: red;"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/estudiantes/guardar'); ?>" method="post" class="formulario">
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
            <input type="text" name="documento" required>
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
            <label>Estado:</label>
            <select name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <label for="fecha_ingreso">Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" required>

        <button type="submit" class="btn-guardar">Guardar Estudiante</button>
    </form>
</div>
<style>
.formulario {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 600px;
}

.form-grupo {
    margin-bottom: 15px;
}

.form-grupo label {
    display: block;
    margin-bottom: 5px;
    color: #8b0000;
}

.form-grupo input,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.btn-guardar {
    background: #8b0000;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-guardar:hover {
    background: #a11d1d;
}
</style>
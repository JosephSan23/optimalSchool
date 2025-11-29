<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Nueva Asignación</h2>
    <hr class="linea">

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert-error">
        <?= session()->getFlashdata('error'); ?>
    </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/asignaciones/guardar'); ?>" method="post" class="formulario">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Estudiante:</label>
                <select name="id_estudiante" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($estudiantes as $e): ?>
                    <option value="<?= $e['id_usuario'] ?>">
                        <?= $e['primer_nombre'] . ' ' . $e['primer_apellido'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-grupo">
                <label>Curso:</label>
                <select name="id_curso" required>
                    <option value="">Seleccione</option>
                    <?php foreach ($cursos as $c): ?>
                    <option value="<?= $c['id_curso'] ?>">
                        <?= $c['nombre_curso'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-grupo">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Guardar Asignación</button>
            </div>

        </div>

    </form>
</div>

<?= $this->endSection() ?>
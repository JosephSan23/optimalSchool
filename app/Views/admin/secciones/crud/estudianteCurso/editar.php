<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Editar Asignación</h2>
    <hr class="linea">

    <form
        action="<?= base_url('admin/asignaciones/actualizar/' . $registro['id_estudiante'] . '/' . $registro['id_curso']); ?>"
        method="post" class="formulario">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Estudiante:</label>
                <select name="id_estudiante" required>
                    <?php foreach ($estudiantes as $e): ?>
                    <option value="<?= $e['id_estudiante'] ?>"
                        <?= $e['id_estudiante'] == $registro['id_estudiante'] ? 'selected' : '' ?>>
                        <?= $e['primer_nombre'] . ' ' . $e['primer_apellido'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-grupo">
                <label>Curso:</label>
                <select name="id_curso" required>
                    <?php foreach ($cursos as $c): ?>
                    <option value="<?= $c['id_curso'] ?>"
                        <?= $c['id_curso'] == $registro['id_curso'] ? 'selected' : '' ?>>
                        <?= $c['nombre_curso'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-grupo">
                <label>Estado:</label>
                <select name="estado">
                    <option value="activo" <?= $registro['estado']=='activo'?'selected':'' ?>>Activo</option>
                    <option value="inactivo" <?= $registro['estado']=='inactivo'?'selected':'' ?>>Inactivo</option>
                </select>
            </div>


            <div class="contenedor-btn">
                <button type="submit" class="btn-guardar">Actualizar</button>
            </div>

        </div>

    </form>
</div>

<?= $this->endSection() ?>
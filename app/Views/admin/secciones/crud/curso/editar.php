<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crear.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">
    <h2>Editar Curso</h2>
    <hr class="linea">

    <form action="<?= base_url('admin/cursos/actualizar'); ?>" method="post" class="formulario">

        <input type="hidden" name="id_curso" value="<?= $curso['id_curso'] ?>">

        <div class="grid-2">

            <div class="form-grupo">
                <label>Nombre del Curso:</label>
                <input type="text" name="nombre_curso" value="<?= esc($curso['nombre_curso']); ?>" required>
            </div>

            <div class="form-grupo">
                <label>Grado:</label>
                <input type="number" name="grado" value="<?= esc($curso['grado']); ?>" required>
            </div>

            <div class="form-grupo">
                <label>Capacidad Máxima:</label>
                <input type="number" name="capacidad_maxima" value="<?= esc($curso['capacidad_maxima']); ?>" required>
            </div>

            <div class="form-grupo">
                <label>Estado:</label>
                <select name="estado">
                    <option value="activo" <?= $curso['estado']=='activo'?'selected':'' ?>>Activo</option>
                    <option value="inactivo" <?= $curso['estado']=='inactivo'?'selected':'' ?>>Inactivo</option>
                </select>
            </div>

            <div class="form-grupo form-descripcion">
                <label>Descripción:</label>
                <textarea name="descripcion" rows="3"><?= esc($curso['descripcion']); ?></textarea>
            </div>

        </div>

        <div class="contenedor-btn">
            <button type="submit" class="btn-guardar">Actualizar Curso</button>
        </div>

    </form>
</div>

<?= $this->endSection() ?>
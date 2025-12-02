<?= $this->extend('estudiante/layout') ?>

<?= $this->section('content') ?>

<div class="content-box">

    <h2>Mis Cursos Asignados</h2>
    <hr>

    <?php if (empty($cursos)): ?>
    <p class="alert alert-warning">Aún no tienes cursos asignados.</p>
    <?php else: ?>

    <div class="lista-cursos">

        <?php foreach ($cursos as $c): ?>
        <div class="curso-card">

            <h3><?= esc($c['nombre_curso']) ?></h3>

            <p><strong>Descripción:</strong> <?= esc($c['descripcion']) ?></p>
            <p><strong>Grado:</strong> <?= esc($c['grado']) ?></p>
            <p><strong>Estado:</strong>
                <span class="estado <?= $c['estado'] ?>">
                    <?= ucfirst($c['estado']) ?>
                </span>
            </p>

            <a href="<?= base_url('estudiante/cursos/detalle/' . $c['id_curso']) ?>" class="btn-ver">
                Ver Detalles
            </a>

        </div>
        <?php endforeach; ?>

    </div>

    <?php endif; ?>

</div>

<div id="courseModal" class="modal-overlay">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h3 class="modal-title">Accede a las secciones del curso: Nombre del curso</h3>
        <p class="modal-description">Elige la seccion a la que deseas ingresar:</p>

        <div class="modal-actions">
            <a href="#" class="modal-button primary-button">
                Ver materias
            </a>
            <a href="#" class="modal-button secondary-button">Ver competencias</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
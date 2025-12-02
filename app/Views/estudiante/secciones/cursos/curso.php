<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/curso.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="cursos-container">
    <h1 class="titulo-cursos">Mis Cursos</h1>

    <div class="cursos-grid">

        <?php if (!empty($cursos)): ?>
        <?php foreach ($cursos as $c): ?>
        <div class="curso-card">

            <div class="curso-header">
                <h2 class="curso-nombre"><?= esc($c['nombre_curso']) ?></h2>
                <span class="curso-estado">
                    <?= esc(ucfirst($c['estado'])) ?>
                </span>
            </div>

            <p class="curso-descripcion">
                <?= esc($c['descripcion'] ?: 'Sin descripción disponible.') ?>
            </p>

            <div class="curso-footer">
                <span class="curso-profesor">Profesor: No asignado</span>
                <span class="curso-grado">Grado: <?= esc($c['grado']) ?>°</span>
            </div>

            <a href="#" class="curso-button">Entrar al curso</a>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>No tienes cursos asignados actualmente.</p>
        <?php endif; ?>

    </div>
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
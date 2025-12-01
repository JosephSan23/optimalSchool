<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/asignatura.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="subjects-container">
    <h1 class="title">Mis Materias</h1>

    <div class="subjects-grid">

        <!-- QUÍMICA -->
        <div class="subject-card color-quimica">
            <div class="subject-icon-container">
                <img src="<?= base_url('assets/img/dashboard/estudiantes/quimica-organica.png') ?>" alt="Quimica">
            </div>

            <h4 class="subject-title">Química Orgánica</h4>

            <p class="subject-description">
                Aprende sobre reacciones, compuestos y estructuras orgánicas fundamentales.
            </p>

            <span class="subject-profesor">Profesor: Laura Vargas</span>

            <a href="#" class="subject-button">Ver contenido</a>
        </div>

        <!-- HISTORIA -->
        <div class="subject-card color-historia">
            <div class="subject-icon-container">
                <img src="<?= base_url('assets/img/dashboard/estudiantes/historia.png') ?>" alt="Historia">
            </div>

            <h4 class="subject-title">Historia Mundial</h4>

            <p class="subject-description">
                Descubre los acontecimientos más importantes que marcaron el mundo.
            </p>

            <span class="subject-profesor">Profesor: Juan Pérez</span>

            <a href="#" class="subject-button">Ver contenido</a>
        </div>

        <!-- Tecnologia -->
        <div class="subject-card color-tecnologia">
            <div class="subject-icon-container">
                <img src="<?= base_url('assets/img/dashboard/estudiantes/tecnologia.png') ?>" alt="Tecnologia">
            </div>

            <h4 class="subject-title">Tecnología</h4>

            <p class="subject-description">
                Explora conceptos fundamentales de informática y herramientas digitales.
            </p>

            <span class="subject-profesor">Profesor: Carlos Gomez</span>

            <a href="#" class="subject-button">Ver contenido</a>
        </div>


    </div>
</div>

<?= $this->endSection() ?>
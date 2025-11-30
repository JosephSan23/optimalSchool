<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/curso.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" materias-container">
    <h1 class="titulo-cursos">Mis Materias</h1>


    <div class="subjects-grid">
        <!-- Curso individual (plantilla) -->
        <div class="subject-card">
            <div class="subject-icon-container">
                <img src="" alt="Quimica">
            </div>

            <h4 class="subject-title">Quimica Organica</h4>
            <span class="subject-profesor">Profesor: Laura Vargas</span>

            <a href="#" class="subject-button">Ver contenido</a>
        </div>

        <div class="subject-card">
            <div class="subject-icon-container">
                <img src="" alt="Historia">
            </div>
            <h4 class="subject-title">Historia Mundial</h4>
            <span class="subject-profesor">Profesor: Juan Pérez</span>
            <a href="#" class="subject-button">Ver contenido</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
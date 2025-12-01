<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/curso.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class=" cursos-container">
    <h1 class="titulo-cursos">Mis Cursos</h1>


    <div class="cursos-grid">
        <!-- Curso individual (plantilla) -->
        <div class="curso-card">
            <div class="curso-header">
                <h2 class="curso-nombre">Nombre del Curso</h2>
                <span class="curso-estado">Activo</span>
            </div>


            <p class="curso-descripcion">Descripción breve del curso o información del profesor.</p>


            <div class="curso-footer">
                <span class="curso-profesor">Profesor: John Doe</span>
                <span class="curso-grado">Grado: 10°</span>
            </div>


            <a href="#" class="curso-button">Entrar al curso</a>
        </div>
        <div class="curso-card">
            <div class="curso-header">
                <h2 class="curso-nombre">Nombre del Curso</h2>
                <span class="curso-estado">Activo</span>
            </div>


            <p class="curso-descripcion">Descripción breve del curso o información del profesor.</p>


            <div class="curso-footer">
                <span class="curso-profesor">Profesor: John Doe</span>
                <span class="curso-grado">Grado: 10°</span>
            </div>


            <a href="#" class="curso-button">Entrar al curso</a>
        </div>

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
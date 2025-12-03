<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/curso.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="dashboard-container">
    <div class="cards">
        <div class="card">
            <h3>Estudiantes</h3>
            <p class="number">325</p>
        </div>

        <div class="card">
            <h3>Estudiantes</h3>
            <p class="number">325</p>
        </div>

        <div class="card">
            <h3>Tareas Pendientes</h3>
            <p class="number">12</p>
        </div>

        <div class="card">
            <h3>Asistencias Hoy</h3>
            <p class="number">96%</p>
        </div>
    </div>


</div>
<?= $this->endSection() ?>
<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/inicio.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="dashboard-container">

    <!-- TARJETAS -->
    <div class="cards">
        <div class="card">
            <h3>Estudiantes</h3>
            <p class="number">325</p>
        </div>

        <div class="card">
            <h3>Profesores</h3>
            <p class="number">45</p>
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

    <!-- ACTIVIDAD RECIENTE -->
    <div class="recent-activity">
        <h3>Actividad Reciente</h3>
        <ul>
            <li>Nuevo curso agregado: Matemáticas 9°</li>
            <li>Profesor asignado: Ensayo de lectura</li>
            <li>Estudiante asignado al curso 801B</li>
        </ul>
    </div>

</div>

<?= $this->endSection() ?>
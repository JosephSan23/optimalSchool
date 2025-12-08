<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/inicio.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="estado-academico">
    <h2>Estado Academico</h2>

    <div class="cards">
        <div class="card">
            <h3>Calificaciones</h3>
            <p>Promedio 4.5</p>
        </div>

        <div class="card">
            <h3>Tareas Pendientes</h3>
            <p>2 Tareas sin entregar</p>
        </div>

        <div class="card">
            <h3>Asistencia</h3>
            <p>95% del mes</p>
        </div>

        <div class="card">
            <h3>Disciplina</h3>
            <p>Sin anotaciones</p>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
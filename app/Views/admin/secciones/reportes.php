<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/reportes.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="reportes-container">

    <h1 class="titulo-main">Centro de Reportes</h1>
    <p class="descripcion-main">
        Descarga reportes completos del sistema. Selecciona una categoría para generar un archivo Excel.
    </p>

    <div class="grid-reportes">

        <div class="card-reporte">
            <div class="icono-area">
                <img src="<?= base_url('assets/img/dashboard/estudiantes.png') ?>" alt="Estudiantes">
            </div>
            <h3>Estudiantes</h3>
            <p>Exporta un reporte detallado de todos los estudiantes registrados en el sistema.</p>

            <a href="<?= base_url('admin/reportes/exportarE') ?>" class="btn-descargar">
                Descargar Excel
            </a>
        </div>

        <div class="card-reporte">
            <div class="icono-area">
                <img src="<?= base_url('assets/img/dashboard/profesores.png') ?>" alt="Profesores">
            </div>
            <h3>Profesores</h3>
            <p>Obtén un archivo Excel con la lista completa de profesores disponibles.</p>

            <a href="<?= base_url('admin/reportes/exportarP') ?>" class="btn-descargar">
                Descargar Excel
            </a>
        </div>

        <div class="card-reporte">
            <div class="icono-area">
                <img src="<?= base_url('assets/img/dashboard/acudientes.png') ?>" alt="Acudientes">
            </div>
            <h3>Acudientes</h3>
            <p>Genera un reporte con toda la información de los acudientes registrados.</p>

            <a href="<?= base_url('admin/reportes/exportarA') ?>" class="btn-descargar">
                Descargar Excel
            </a>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
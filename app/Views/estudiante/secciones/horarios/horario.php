<?= $this->extend('estudiante/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/estudiante/horario.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="horario-container">
    <h1 class="titulo-horario">Mi Horario Semanal</h1>

    <div class="horario-grid">

        <!-- Lunes -->
        <div class="horario-dia">
            <h3>Lunes</h3>

            <div class="hora-card math">
                <span class="hora">08:00 - 10:00</span>
                <span class="materia">Matemáticas</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card spanish">
                <span class="hora">10:00 - 11:00</span>
                <span class="materia">Lengua y Literatura</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card history">
                <span class="hora">11:00 - 12:00</span>
                <span class="materia">Historia</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card english">
                <span class="hora">12:00 - 14:00</span>
                <span class="materia">Inglés</span>
                <a href="#">Ver materia</a>
            </div>
        </div>


        <!-- Martes -->
        <div class="horario-dia">
            <h3>Martes</h3>

            <div class="hora-card science">
                <span class="hora">08:00 - 09:00</span>
                <span class="materia">Ciencias Naturales</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card math">
                <span class="hora">09:00 - 11:00</span>
                <span class="materia">Matemáticas</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card tech">
                <span class="hora">11:00 - 12:00</span>
                <span class="materia">Tecnología</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card spanish">
                <span class="hora">12:00 - 14:00</span>
                <span class="materia">Lengua y Literatura</span>
                <a href="#">Ver materia</a>
            </div>
        </div>


        <!-- Miércoles -->
        <div class="horario-dia">
            <h3>Miércoles</h3>

            <div class="hora-card english">
                <span class="hora">08:00 - 10:00</span>
                <span class="materia">Inglés</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card chemistry">
                <span class="hora">10:00 - 11:00</span>
                <span class="materia">Química</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card ethics">
                <span class="hora">11:00 - 12:00</span>
                <span class="materia">Ética</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card art">
                <span class="hora">12:00 - 14:00</span>
                <span class="materia">Arte</span>
                <a href="#">Ver materia</a>
            </div>
        </div>


        <!-- Jueves -->
        <div class="horario-dia">
            <h3>Jueves</h3>

            <div class="hora-card science">
                <span class="hora">08:00 - 10:00</span>
                <span class="materia">Biología</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card spanish">
                <span class="hora">10:00 - 11:00</span>
                <span class="materia">Lengua y Literatura</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card math">
                <span class="hora">11:00 - 12:00</span>
                <span class="materia">Matemáticas</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card pe">
                <span class="hora">12:00 - 14:00</span>
                <span class="materia">Educación Física</span>
                <a href="#">Ver materia</a>
            </div>
        </div>


        <!-- Viernes -->
        <div class="horario-dia">
            <h3>Viernes</h3>

            <div class="hora-card math">
                <span class="hora">08:00 - 09:00</span>
                <span class="materia">Matemáticas</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card science">
                <span class="hora">09:00 - 10:00</span>
                <span class="materia">Ciencias Naturales</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card english">
                <span class="hora">10:00 - 12:00</span>
                <span class="materia">Inglés</span>
                <a href="#">Ver materia</a>
            </div>

            <div class="hora-card art">
                <span class="hora">12:00 - 14:00</span>
                <span class="materia">Arte</span>
                <a href="#">Ver materia</a>
            </div>
        </div>

    </div>
</div>


<?= $this->endSection() ?>
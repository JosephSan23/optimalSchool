<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crud.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">

    <div class="content-header">
        <h2>Gestión de Cursos</h2>

        <a href="<?= base_url('admin/cursos/crear'); ?>" class="btn-primary">
            + Nuevo Curso
        </a>
    </div>

    <div class="content-body">
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Curso</th>
                    <th>Grado</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($cursos)): ?>
                <?php foreach ($cursos as $c): ?>
                <tr>
                    <td><?= esc($c['id_curso']); ?></td>
                    <td><?= esc($c['nombre_curso']); ?></td>
                    <td><?= esc($c['grado']); ?>°</td>
                    <td><?= esc($c['capacidad_maxima']); ?></td>

                    <td>
                        <span class="estado <?= $c['estado']; ?>">
                            <?= ucfirst($c['estado']); ?>
                        </span>
                    </td>

                    <td class="acciones">
                        <a href="<?= base_url('admin/cursos/editar/'.$c['id_curso']); ?>" class="btn-edit">
                            Editar
                        </a>

                        <a href="<?= base_url('admin/cursos/eliminar/'.$c['id_curso']); ?>" class="btn-delete"
                            onclick="return confirm('¿Seguro que deseas eliminar este curso?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>

                <tr>
                    <td colspan="6" class="sin-registros">No hay cursos registrados</td>
                </tr>

                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
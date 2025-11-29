<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/crud.css?v=' . time()) ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">

    <div class="content-header">
        <h2>Asignación de Estudiantes a Cursos</h2>

        <a href="<?= base_url('admin/asignaciones/crear'); ?>" class="btn-primary">
            + Nueva Asignación
        </a>
    </div>

    <div class="content-body">
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Estado</th>
                    <th>Fecha Inscripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($asignaciones)): ?>
                <?php foreach ($asignaciones as $a): ?>
                <tr>
                    <td><?= esc($a['id_estudiante'] . ' - ' . $a['id_curso']); ?></td>


                    <td><?= esc($a['primer_nombre'] . ' ' . $a['primer_apellido']); ?></td>

                    <td><?= esc($a['nombre_curso']); ?></td>

                    <td>
                        <span class="estado <?= $a['estado']; ?>">
                            <?= ucfirst($a['estado']); ?>
                        </span>
                    </td>

                    <td><?= esc($a['fecha_inscripcion']); ?></td>

                    <td class="acciones">
                        <a href="<?= base_url("admin/asignaciones/editar/{$a['id_estudiante']}/{$a['id_curso']}") ?>"
                            class="btn-edit">
                            Editar
                        </a>

                        <a href="<?= base_url("admin/asignaciones/eliminar/{$a['id_estudiante']}/{$a['id_curso']}") ?>"
                            class="btn-delete"
                            onclick="return confirm('¿Seguro que deseas eliminar esta asignación?');">
                            Eliminar
                        </a>

                        <?php if ($a['estado'] == 'inscrito'): ?>
                        <a href="<?= base_url('admin/asignaciones/retirar/'.$a['id_estudiante'].'/'.$a['id_curso']); ?>"
                            class="btn-warning" onclick="return confirm('¿Retirar estudiante del curso?');">
                            Retirar
                        </a>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="sin-registros">No hay asignaciones registradas</td>
                </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
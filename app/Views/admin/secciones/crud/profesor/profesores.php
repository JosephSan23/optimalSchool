<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?=  base_url('assets/css/admin/crud.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">

    <div class="content-header">
        <h2>Gestión de Profesor</h2>

        <a href="<?= base_url('admin/profesores/crear'); ?>" class="btn-primary">
            + Nuevo Profesor
        </a>
    </div>

    <div class="content-body">
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Primer Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Documento</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Título Académico</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($profesores)): ?>
                <?php foreach ($profesores as $p): ?>
                <tr>
                    <td><?= esc($p['id_usuario']); ?></td>
                    <td><?= esc($p['primer_nombre']); ?></td>
                    <td><?= esc($p['primer_apellido']); ?></td>
                    <td><?= esc($p['documento']); ?></td>
                    <td><?= esc($p['username']); ?></td>
                    <td><?= esc($p['correo']); ?></td>
                    <td><?= esc($p['telefono']); ?></td>
                    <td><?= esc($p['titulo_academico']); ?></td>
                    <td class="acciones">
                        <a href="<?= base_url('admin/profesores/editar/'.$p['id_usuario']); ?>"
                            class="btn-edit">Editar</a>
                        <a href="<?= base_url('admin/profesores/eliminar/'.$p['id_usuario']); ?>" class="btn-delete"
                            onclick="return confirm('¿Seguro que deseas eliminar este profesor?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                <tr>
                    <td colspan="9" class="sin-registros">No hay profesores registrados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
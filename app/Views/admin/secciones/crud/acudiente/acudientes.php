<?= $this->extend('admin/layout') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?=  base_url('assets/css/admin/crud.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="content-box">

    <div class="content-header">
        <h2>Gestión de acudiente</h2>

        <a href="<?= base_url('admin/acudientes/crear'); ?>" class="btn-primary">
            + Nuevo acudiente
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
                    <th>Parentesco</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($acudientes)): ?>
                <?php foreach ($acudientes as $a): ?>
                <tr>
                    <td><?= esc($a['id_usuario']); ?></td>
                    <td><?= esc($a['primer_nombre']); ?></td>
                    <td><?= esc($a['primer_apellido']); ?></td>
                    <td><?= esc($a['documento']); ?></td>
                    <td><?= esc($a['username']); ?></td>
                    <td><?= esc($a['correo']); ?></td>
                    <td><?= esc($a['telefono']); ?></td>
                    <td><?= esc($a['parentesco']); ?></td>
                    <td class="acciones">
                        <a href="<?= base_url('admin/acudientes/editar/'.$a['id_usuario']); ?>"
                            class="btn-edit">Editar</a>
                        <a href="<?= base_url('admin/acudientes/eliminar/'.$a['id_usuario']); ?>" class="btn-delete"
                            onclick="return confirm('¿Seguro que deseas eliminar este acudiente?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                <tr>
                    <td colspan="9" class="sin-registros">No hay acudientes registrados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
<link rel="stylesheet" href="<?=  base_url('css/admin/crud.css') ?>">

<div class="content-box">

    <div class="content-header">
        <h2>Gestión de Estudiantes</h2>

        <a href="<?= base_url('admin/estudiantes/crear'); ?>" class="btn-primary">
            + Nuevo Estudiante
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
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($estudiantes)): ?>
                <?php foreach ($estudiantes as $e): ?>
                <tr>
                    <td><?= esc($e['id_usuario']); ?></td>
                    <td><?= esc($e['primer_nombre']); ?></td>
                    <td><?= esc($e['primer_apellido']); ?></td>
                    <td><?= esc($e['documento']); ?></td>
                    <td><?= esc($e['nombre_usuario']); ?></td>
                    <td><?= esc($e['correo']); ?></td>
                    <td><?= esc($e['telefono']); ?></td>

                    <td>
                        <span class="estado <?= $e['estado']; ?>">
                            <?= ucfirst($e['estado']); ?>
                        </span>
                    </td>

                    <td class="acciones">
                        <a href="<?= base_url('admin/estudiantes/editar/'.$e['id_usuario']); ?>"
                            class="btn-edit">Editar</a>
                        <a href="<?= base_url('admin/estudiantes/eliminar/'.$e['id_usuario']); ?>" class="btn-delete"
                            onclick="return confirm('¿Seguro que deseas eliminar este estudiante?');">
                            Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                <tr>
                    <td colspan="8" class="sin-registros">No hay estudiantes registrados</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
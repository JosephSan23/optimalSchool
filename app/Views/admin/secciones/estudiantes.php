<div class="dash-main">
    <h2>Gestión de Estudiantes</h2>
    <hr style="margin: 15px 0;">

    <!-- Botón para agregar nuevo estudiante -->
    <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
        <a href="<?= base_url('admin/estudiantes/crear'); ?>"
            style="background-color: #8b0000; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
            + Nuevo Estudiante
        </a>
    </div>

    <!-- Tabla de estudiantes -->
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
                <td><?= esc($e['correo']); ?></td>
                <td><?= esc($e['telefono']); ?></td>
                <td>
                    <span style="color: <?= $e['estado'] === 'activo' ? 'green' : 'red'; ?>;">
                        <?= ucfirst($e['estado']); ?>
                    </span>
                </td>
                <td>
                    <a href="<?= base_url('admin/estudiantes/editar/'.$e['id_usuario']); ?>"
                        style="color: #8b0000; text-decoration: none; font-weight: bold; margin-right: 10px;">Editar</a>
                    <a href="<?= base_url('admin/estudiantes/eliminar/'.$e['id_usuario']); ?>"
                        style="color: red; text-decoration: none; font-weight: bold;"
                        onclick="return confirm('¿Seguro que deseas eliminar este estudiante?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8" style="text-align:center;">No hay estudiantes registrados</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php require_once '../partials/header.php'; ?>

<h1>Coordinadores</h1>
<a href="create.php">Crear Coordinador</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Centro ID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($coordinadores)): ?>
            <?php foreach ($coordinadores as $coordinador): ?>
                <tr>
                    <td><?= htmlspecialchars($coordinador['id']) ?></td>
                    <td><?= htmlspecialchars($coordinador['nombre']) ?></td>
                    <td><?= htmlspecialchars($coordinador['centro_id']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $coordinador['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $coordinador['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay coordinadores registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once '../partials/footer.php'; ?>
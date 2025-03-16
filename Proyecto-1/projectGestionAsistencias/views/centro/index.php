<?php require_once '../partials/header.php'; ?>

<h1>Centros</h1>
<a href="create.php">Crear Centro</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Regional ID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($centros)): ?>
            <?php foreach ($centros as $centro): ?>
                <tr>
                    <td><?= $centro['id'] ?></td>
                    <td><?= $centro['nombre'] ?></td>
                    <td><?= $centro['regional_id'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $centro['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $centro['id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay centros registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once '../partials/footer.php'; ?>
<?php require_once '../partials/header.php'; ?>

<h1>Regionales</h1>
<a href="create.php">Crear Regional</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($regionales)): ?>
            <?php foreach ($regionales as $regional): ?>
            <tr>
                <td><?= $regional['id'] ?></td>
                <td><?= $regional['nombre'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $regional['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $regional['id'] ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No hay regionales registradas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require_once '../partials/footer.php'; ?>
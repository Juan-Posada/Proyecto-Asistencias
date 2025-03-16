<?php require_once '../partials/header.php'; ?>

<h1>Editar Centro</h1>
<form action="edit.php?id=<?= $centroData['id'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= $centroData['nombre'] ?>" required>
    <label for="regional_id">Regional ID:</label>
    <input type="number" name="regional_id" id="regional_id" value="<?= $centroData['regional_id'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php require_once '../partials/footer.php'; ?>
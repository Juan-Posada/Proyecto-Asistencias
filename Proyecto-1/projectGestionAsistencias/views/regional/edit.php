<?php require_once '../partials/header.php'; ?>

<h1>Editar Regional</h1>
<form action="edit.php?id=<?= $regionalData['id'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= $regionalData['nombre'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php require_once '../partials/footer.php'; ?>
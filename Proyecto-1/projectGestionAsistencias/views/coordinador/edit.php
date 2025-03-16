<?php require_once '../partials/header.php'; ?>

<h1>Editar Coordinador</h1>
<form action="edit.php?id=<?= $coordinadorData['id'] ?>" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?= $coordinadorData['nombre'] ?>" required>
    <label for="centro_id">Centro ID:</label>
    <input type="number" name="centro_id" id="centro_id" value="<?= $coordinadorData['centro_id'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

<?php require_once '../partials/footer.php'; ?>
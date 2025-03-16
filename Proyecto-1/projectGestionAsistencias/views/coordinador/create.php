<?php require_once '../partials/header.php'; ?>

<h1>Crear Coordinador</h1>
<form action="create.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="centro_id">Centro ID:</label>
    <input type="number" name="centro_id" id="centro_id" required>
    <button type="submit">Crear</button>
</form>

<?php require_once '../partials/footer.php'; ?>
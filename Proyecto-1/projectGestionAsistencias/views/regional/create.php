<?php require_once '../partials/header.php'; ?>

<h1>Crear Regional</h1>
<form action="create.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <button type="submit">Crear</button>
</form>

<?php require_once '../partials/footer.php'; ?>
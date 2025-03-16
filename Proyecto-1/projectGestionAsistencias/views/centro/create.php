<?php require_once '../partials/header.php'; ?>

<h1>Crear Centro</h1>
<form action="create.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="regional_id">Regional ID:</label>
    <input type="number" name="regional_id" id="regional_id" required>
    <button type="submit">Crear</button>
</form>

<?php require_once '../partials/footer.php'; ?>
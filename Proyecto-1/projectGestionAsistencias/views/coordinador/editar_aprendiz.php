<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'coordinador') {
    header('Location: ../../login.php');
    exit();
}

require_once __DIR__ . '/../../controllers/CoordinadorController.php';

$coordinador = new Coordinador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new CoordinadorController($coordinador);

// Verificar si se proporcionó un ID válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Error: ID de aprendiz no válido.";
    exit();
}

$id = $_GET['id'];

// Obtener los datos del aprendiz
$aprendiz = $controller->obtenerAprendizPorId($id); // Método que debes implementar en el controlador

// Verificar si el aprendiz existe
if (!$aprendiz) {
    echo "Error: Aprendiz no encontrado.";
    exit();
}

// Obtener la lista de fichas para el select
$fichas = $controller->listarFichas();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ficha_id = $_POST['ficha_id'];

    if ($controller->editarAprendiz($id, $nombre, $ficha_id)) {
        header('Location: aprendices.php');
        exit();
    } else {
        $error = "Error al editar el aprendiz";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Aprendiz</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Editar Aprendiz</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($aprendiz['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="ficha_id">Ficha:</label>
        <select id="ficha_id" name="ficha_id" required>
            <?php foreach ($fichas as $ficha): ?>
                <option value="<?php echo $ficha['id']; ?>" <?php echo ($ficha['id'] == $aprendiz['ficha_id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($ficha['codigo'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
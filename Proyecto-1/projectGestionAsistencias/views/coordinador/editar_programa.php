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
    echo "Error: ID de programa no válido.";
    exit();
}

$id = $_GET['id'];

// Obtener los datos del programa
$programa = $controller->obtenerProgramaPorId($id); // Método que debes implementar en el controlador

// Verificar si el programa existe
if (!$programa) {
    echo "Error: Programa no encontrado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    if ($controller->editarPrograma($id, $nombre)) {
        header('Location: programas.php');
        exit();
    } else {
        $error = "Error al editar el programa";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Programa</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Editar Programa</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre del Programa:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($programa['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
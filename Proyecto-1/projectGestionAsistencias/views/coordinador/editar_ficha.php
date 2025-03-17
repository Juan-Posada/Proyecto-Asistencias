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
    echo "Error: ID de ficha no válido.";
    exit();
}

$id = $_GET['id'];

// Obtener los datos de la ficha
$ficha = $controller->obtenerFichaPorId($id); // Método que debes implementar en el controlador

// Verificar si la ficha existe
if (!$ficha) {
    echo "Error: Ficha no encontrada.";
    exit();
}

// Obtener la lista de programas para el select
$programas = $controller->listarProgramas();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $programa_id = $_POST['programa_id'];

    if ($controller->editarFicha($id, $codigo, $programa_id)) {
        header('Location: fichas.php');
        exit();
    } else {
        $error = "Error al editar la ficha";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Ficha</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Editar Ficha</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="codigo">Código de la Ficha:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($ficha['codigo'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="programa_id">Programa:</label>
        <select id="programa_id" name="programa_id" required>
            <?php foreach ($programas as $programa): ?>
                <option value="<?php echo $programa['id']; ?>" <?php echo ($programa['id'] == $ficha['programa_id']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($programa['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
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
    echo "Error: ID de instructor no válido.";
    exit();
}

$id = $_GET['id'];

// Obtener los datos del instructor
$instructor = $controller->obtenerInstructorPorId($id); // Método que debes implementar en el controlador

// Verificar si el instructor existe
if (!$instructor) {
    echo "Error: Instructor no encontrado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $regional = $_POST['regional'];
    $centro_academico = $_POST['centro_academico'];

    if ($controller->editarInstructor($id, $nombre, $email, $regional, $centro_academico)) {
        header('Location: instructores.php');
        exit();
    } else {
        $error = "Error al editar el instructor";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Instructor</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Editar Instructor</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($instructor['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($instructor['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="regional">Regional:</label>
        <input type="text" id="regional" name="regional" value="<?php echo htmlspecialchars($instructor['regional'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <label for="centro_academico">Centro Académico:</label>
        <input type="text" id="centro_academico" name="centro_academico" value="<?php echo htmlspecialchars($instructor['centro_academico'], ENT_QUOTES, 'UTF-8'); ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
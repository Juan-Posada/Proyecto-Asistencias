<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'coordinador') {
    header('Location: ../../login.php');
    exit();
}

require_once __DIR__ . '/../../controllers/CoordinadorController.php';

$coordinador = new Coordinador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new CoordinadorController($coordinador);

$ficha_id = $_GET['ficha_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    if ($controller->crearAprendiz($nombre, $ficha_id)) {
        header('Location: aprendices.php?ficha_id=' . $ficha_id);
        exit();
    } else {
        $error = "Error al crear el aprendiz";
    }
}

$aprendices = $controller->listarAprendicesPorFicha($ficha_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aprendices</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Aprendices de la Ficha <?php echo $ficha_id; ?></h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre del Aprendiz:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Crear Aprendiz</button>
    </form>

    <h2>Lista de Aprendices</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aprendices as $aprendiz): ?>
                <tr>
                    <td><?php echo $aprendiz['id']; ?></td>
                    <td><?php echo $aprendiz['nombre']; ?></td>
                    <td>
                        <a href="editar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>">Editar</a>
                        <a href="eliminar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'coordinador') {
    header('Location: ../../login.php');
    exit();
}

require_once __DIR__ . '/../../controllers/CoordinadorController.php';

$coordinador = new Coordinador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new CoordinadorController($coordinador);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    if ($controller->crearPrograma($nombre)) {
        header('Location: programas.php');
        exit();
    } else {
        $error = "Error al crear el programa";
    }
}

$programas = $controller->listarProgramas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas de Formación</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Programas de Formación</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre del Programa:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Crear Programa</button>
    </form>

    <h2>Lista de Programas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programas as $programa): ?>
                <tr>
                    <td><?php echo $programa['id']; ?></td>
                    <td><?php echo $programa['nombre']; ?></td>
                    <td>
                        <a href="editar_programa.php?id=<?php echo $programa['id']; ?>">Editar</a>
                        <a href="eliminar_programa.php?id=<?php echo $programa['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
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

    if ($controller->crearAmbiente($nombre)) {
        header('Location: ambientes.php');
        exit();
    } else {
        $error = "Error al crear el ambiente";
    }
}

$ambientes = $controller->listarAmbientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ambientes</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Ambientes</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre del Ambiente:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Crear Ambiente</button>
    </form>

    <h2>Lista de Ambientes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ambientes as $ambiente): ?>
                <tr>
                    <td><?php echo $ambiente['id']; ?></td>
                    <td><?php echo $ambiente['nombre']; ?></td>
                    <td>
                        <a href="editar_ambiente.php?id=<?php echo $ambiente['id']; ?>">Editar</a>
                        <a href="eliminar_ambiente.php?id=<?php echo $ambiente['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'superadministrador') {
    header('Location: login.php');
    exit();
}

require_once '../controllers/SuperAdministradorController.php';

$superAdministrador = new SuperAdministrador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new SuperAdministradorController($superAdministrador);

$coordinadores = $controller->listarCoordinadores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listar Coordinadores</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Listar Coordinadores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Regional</th>
                <th>Centro Académico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coordinadores as $coordinador): ?>
                <tr>
                    <td><?php echo $coordinador['id']; ?></td>
                    <td><?php echo $coordinador['nombre']; ?></td>
                    <td><?php echo $coordinador['email']; ?></td>
                    <td><?php echo $coordinador['regional']; ?></td>
                    <td><?php echo $coordinador['centro_academico']; ?></td>
                    <td>
                        <a href="editar_coordinador.php?id=<?php echo $coordinador['id']; ?>">Editar</a>
                        <a href="eliminar_coordinador.php?id=<?php echo $coordinador['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
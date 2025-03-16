<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $usuario['nombre']; ?></h1>
    <p>Su Rol es: <?php echo $usuario['rol']; ?></p>
    <a href="logout.php">Cerrar Sesión</a>

    <?php if ($usuario['rol'] === 'superadministrador'): ?>
        <h2>Acciones de Super Administrador</h2>
        <ul>
            <li><a href="views/superadministrador/registrar_coordinador.php">Registrar Coordinador</a></li>
            <li><a href="views/superadministrador/listar_coordinadores.php">Listar Coordinadores</a></li>
        </ul>
    <?php endif; ?>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'superadministrador') {
    header('Location: ../../login.php');
    exit();
}

// Incluir el controlador SuperAdministradorController
require_once '../../controllers/SuperAdministradorController.php';

// Obtener el super administrador actual
$superAdministrador = new SuperAdministrador(
    $_SESSION['usuario']['id'],
    $_SESSION['usuario']['nombre'],
    $_SESSION['usuario']['email'],
    $_SESSION['usuario']['password'],
    $_SESSION['usuario']['regional'],
    $_SESSION['usuario']['centro_academico']
);

// Crear el controlador
$controller = new SuperAdministradorController($superAdministrador);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $regional = $_POST['regional'];
    $centro_academico = $_POST['centro_academico'];

    if ($controller->registrarCoordinador($nombre, $email, $password, $regional, $centro_academico)) {
        header('Location: listar_coordinadores.php');
        exit();
    } else {
        $error = "Error al registrar el coordinador";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Coordinador</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Registrar Coordinador</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="regional">Regional:</label>
        <input type="text" id="regional" name="regional" required>
        <br>
        <label for="centro_academico">Centro Académico:</label>
        <input type="text" id="centro_academico" name="centro_academico" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
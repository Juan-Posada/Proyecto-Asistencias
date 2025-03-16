<?php
session_start();

// Incluir la clase Conexion
require_once '../../config/Conexion.php';

// Verificar si ya existe un super administrador
$conexion = Conexion::obtenerInstancia();
$result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'superadministrador'");
if ($result->num_rows > 0) {
    header('Location: ../../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $regional = $_POST['regional'];
    $centro_academico = $_POST['centro_academico'];

    // Hashear la contraseña
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el super administrador en la base de datos
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol, regional, centro_academico, creado_por) VALUES (?, ?, ?, 'superadministrador', ?, ?, NULL)");
    $stmt->bind_param("sssss", $nombre, $email, $passwordHash, $regional, $centro_academico);

    if ($stmt->execute()) {
        header('Location: ../../login.php');
        exit();
    } else {
        $error = "Error al registrar el super administrador";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Super Administrador</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Registrar Super Administrador</h1>
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
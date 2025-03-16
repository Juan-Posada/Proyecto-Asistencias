<?php
session_start();

// Incluir la clase Conexion
require_once 'config/Conexion.php';

// Verificar si ya existe un super administrador
$conexion = Conexion::obtenerInstancia();
$result = $conexion->query("SELECT * FROM usuarios WHERE rol = 'superadministrador'");
if ($result->num_rows === 0) {
    header('Location: views/superadministrador/registrar_superadministrador.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar el usuario por email
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Verificar el rol del usuario
        if ($usuario['rol'] === 'superadministrador' || $usuario['rol'] === 'coordinador' || $usuario['rol'] === 'instructor') {
            // Iniciar sesión
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            exit();
        } else {
            $error = "No tienes permisos para acceder al sistema.";
        }
    } else {
        $error = "Email o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
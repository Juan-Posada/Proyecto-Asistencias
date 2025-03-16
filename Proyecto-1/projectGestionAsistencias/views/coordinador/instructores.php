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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $regional = $_POST['regional'];
    $centro_academico = $_POST['centro_academico'];

    if ($controller->crearInstructor($nombre, $email, $password, $regional, $centro_academico)) {
        header('Location: instructores.php');
        exit();
    } else {
        $error = "Error al crear el instructor";
    }
}

$instructores = $controller->listarInstructores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Instructores</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Instructores</h1>
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
        <button type="submit">Crear Instructor</button>
    </form>

    <h2>Lista de Instructores</h2>
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
            <?php foreach ($instructores as $instructor): ?>
                <tr>
                    <td><?php echo $instructor['id']; ?></td>
                    <td><?php echo $instructor['nombre']; ?></td>
                    <td><?php echo $instructor['email']; ?></td>
                    <td><?php echo $instructor['regional']; ?></td>
                    <td><?php echo $instructor['centro_academico']; ?></td>
                    <td>
                        <a href="editar_instructor.php?id=<?php echo $instructor['id']; ?>">Editar</a>
                        <a href="eliminar_instructor.php?id=<?php echo $instructor['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
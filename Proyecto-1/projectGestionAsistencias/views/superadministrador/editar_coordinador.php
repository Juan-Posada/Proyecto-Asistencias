<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'superadministrador') {
    header('Location: login.php');
    exit();
}

require_once '../controllers/SuperAdministradorController.php';

$superAdministrador = new SuperAdministrador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new SuperAdministradorController($superAdministrador);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $regional = $_POST['regional'];
    $centro_academico = $_POST['centro_academico'];

    if ($controller->editarCoordinador($id, $nombre, $email, $regional, $centro_academico)) {
        header('Location: listar_coordinadores.php');
        exit();
    } else {
        $error = "Error al editar el coordinador";
    }
} else {
    $id = $_GET['id'];
    $coordinadores = $controller->listarCoordinadores();
    $coordinador = array_filter($coordinadores, function($coordinador) use ($id) {
        return $coordinador['id'] == $id;
    });
    $coordinador = array_shift($coordinador);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Coordinador</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Editar Coordinador</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $coordinador['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $coordinador['nombre']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $coordinador['email']; ?>" required>
        <br>
        <label for="regional">Regional:</label>
        <input type="text" id="regional" name="regional" value="<?php echo $coordinador['regional']; ?>" required>
        <br>
        <label for="centro_academico">Centro Académico:</label>
        <input type="text" id="centro_academico" name="centro_academico" value="<?php echo $coordinador['centro_academico']; ?>" required>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
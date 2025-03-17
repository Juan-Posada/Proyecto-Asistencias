<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'coordinador') {
    header('Location: ../../login.php');
    exit();
}

require_once __DIR__ . '/../../controllers/CoordinadorController.php';

$coordinador = new Coordinador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new CoordinadorController($coordinador);

// Obtener la lista de fichas para el select
$fichas = $controller->listarFichas();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ficha_id = $_POST['ficha_id'];

    if ($controller->crearAprendiz($nombre, $ficha_id)) {
        header('Location: aprendices.php');
        exit();
    } else {
        $error = "Error al crear el aprendiz";
    }
}

// Obtener todos los aprendices con información de la ficha
$aprendices = [];
$todasFichas = $controller->listarFichas();
foreach ($todasFichas as $ficha) {
    $aprendicesFicha = $controller->listarAprendicesPorFicha($ficha['id']);
    foreach ($aprendicesFicha as $aprendiz) {
        $aprendiz['ficha_codigo'] = $ficha['codigo']; // Agregar el código de la ficha
        $aprendices[] = $aprendiz;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aprendices</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Gestión de Aprendices</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulario para crear un aprendiz -->
    <h2>Crear Aprendiz</h2>
    <form method="POST">
        <label for="nombre">Nombre del Aprendiz:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="ficha_id">Ficha:</label>
        <select id="ficha_id" name="ficha_id" required>
            <?php foreach ($fichas as $ficha): ?>
                <option value="<?php echo $ficha['id']; ?>"><?php echo $ficha['codigo']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Crear Aprendiz</button>
    </form>

    <!-- Lista de aprendices -->
    <h2>Lista de Aprendices</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ficha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aprendices as $aprendiz): ?>
                <tr>
                    <td><?php echo $aprendiz['id']; ?></td>
                    <td><?php echo $aprendiz['nombre']; ?></td>
                    <td><?php echo $aprendiz['ficha_codigo']; ?></td>
                    <td>
                        <a href="editar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>">Editar</a>
                        <a href="eliminar_aprendiz.php?id=<?php echo $aprendiz['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este aprendiz?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
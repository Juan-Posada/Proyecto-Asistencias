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
    $codigo = $_POST['codigo'];
    $programa_id = $_POST['programa_id'];

    if ($controller->crearFicha($codigo, $programa_id)) {
        header('Location: fichas.php');
        exit();
    } else {
        $error = "Error al crear la ficha";
    }
}

$fichas = $controller->listarFichas();
$programas = $controller->listarProgramas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fichas</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Fichas</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="codigo">Código de la Ficha:</label>
        <input type="text" id="codigo" name="codigo" required>
        <br>
        <label for="programa_id">Programa:</label>
        <select id="programa_id" name="programa_id" required>
            <?php foreach ($programas as $programa): ?>
                <option value="<?php echo $programa['id']; ?>"><?php echo $programa['nombre']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Crear Ficha</button>
    </form>

    <h2>Lista de Fichas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fichas as $ficha): ?>
                <tr>
                    <td><?php echo $ficha['id']; ?></td>
                    <td><?php echo $ficha['codigo']; ?></td>
                    <td>
                        <?php
                        // Obtener el nombre del programa
                        $programa = array_filter($programas, function($programa) use ($ficha) {
                            return $programa['id'] == $ficha['programa_id'];
                        });
                        $programa = array_shift($programa);
                        echo $programa ? $programa['nombre'] : 'Programa no encontrado';
                        ?>
                    </td>
                    <td>
                        <a href="editar_ficha.php?id=<?php echo $ficha['id']; ?>">Editar</a>
                        <a href="eliminar_ficha.php?id=<?php echo $ficha['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
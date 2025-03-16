<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'superadministrador') {
    header('Location: ../../login.php');
    exit();
}

// Incluir el controlador SuperAdministradorController
require_once __DIR__ . '/../../controllers/SuperAdministradorController.php';

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

// Obtener el ID del coordinador a eliminar
$id = $_GET['id'];

// Eliminar el coordinador
if ($controller->eliminarCoordinador($id)) {
    header('Location: listar_coordinadores.php');
    exit();
} else {
    echo "Error al eliminar el coordinador";
}
?>
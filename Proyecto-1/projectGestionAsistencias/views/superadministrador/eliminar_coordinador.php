<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'superadministrador') {
    header('Location: login.php');
    exit();
}

require_once '../controllers/SuperAdministradorController.php';

$superAdministrador = new SuperAdministrador($_SESSION['usuario']['id'], $_SESSION['usuario']['nombre'], $_SESSION['usuario']['email'], $_SESSION['usuario']['password'], $_SESSION['usuario']['regional'], $_SESSION['usuario']['centro_academico']);
$controller = new SuperAdministradorController($superAdministrador);

$id = $_GET['id'];
if ($controller->eliminarCoordinador($id)) {
    header('Location: listar_coordinadores.php');
    exit();
} else {
    echo "Error al eliminar el coordinador";
}
?>
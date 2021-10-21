<?php
require_once 'config/db.php';
require_once 'utils/helpers.php';
require_once 'controller/actividadController.php';

session_start();

if (isset($_POST['saveStatus']) && isset($_SESSION['Jugador'])) {
    $actividad = new actividadController();
    $actividad->guardarEstadoJugador();
}else if (isset($_POST['compStatus']) && isset($_SESSION['Jugador'])) {
    $status = json_decode($_POST['compStatus']);
    $actividad = new actividadController();
    $actividad->verifyStatus($status);
}

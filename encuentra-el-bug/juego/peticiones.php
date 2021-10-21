<?php
require_once 'config/db.php';
require_once 'utils/helpers.php';
require_once 'controller/actividadController.php';
require_once 'controller/juegoController.php';

session_start();

//var_dump($_SESSION['room']);

if (isset($_POST['actualizarPlayers'])) {
    $room_U = new juegoController();
    $room_U->actualizarRoom();

    //var_dump($_SESSION['room']);

    $controller = new actividadController();
    $Players = $controller->getStatusPlayers();

    $controller->verifyStatusPlayers($Players);
}else if (isset($_POST['actualizarDOMJugadores'])) {
    $actualizar = new juegoController();
    $actualizar->indJugador();
}else if (isset($_POST['insertActivityPlayer'])) {
    $controller = new actividadController();
    $controller->setActividadPlayer();
}else if (isset($_POST['verifyActifityOnline'])) {
    $controller = new actividadController();
    $controller->verifyStatus(json_decode($_POST['verifyActifityOnline']));
}

/*
if (isset($_POST['saveStatus']) && isset($_SESSION['Jugador'])) {
    $actividad = new actividadController();
    $actividad->guardarEstadoJugador();
}else if (isset($_POST['compStatus']) && isset($_SESSION['Jugador']) && isset($_SESSION['room'])) {
    $status = json_decode($_POST['compStatus']);
    $actividad = new actividadController();
    $actividad->verifyStatus($status);
}
if (isset($_GET['doomReload'])) {
    $actualizar = new juegoController();
    $actualizar->indJugador();
}
if (isset($_POST['diePlayers'])) {
    $dieP = new actividadController();
    $dieP->diePlayers();
}
*/
<?php
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'utils/helpers.php';
require_once 'controller/actividadController.php';
require_once 'controller/juegoController.php';
require_once 'controller/partidaController.php';

session_start();

//var_dump($_SESSION['room']);

if (isset($_POST['actualizarPlayers'])) {
    // Me trae la nueva informacion de la tabla room
    $room_U = new juegoController();
    $room_U->actualizarRoom();

    var_dump($_SESSION['room']);

    $controller = new actividadController();
    $Players = $controller->getStatusPlayers();

    $controller->verifyStatusPlayers($Players);
}else if (isset($_POST['actualizarDOMJugadores'])) {
    $room_U = new juegoController();
    $room_U->actualizarRoom();

    $actualizar = new juegoController();
    $actualizar->indJugador();
}else if (isset($_POST['insertActivityPlayer'])) {
    $room_U = new juegoController();
    $room_U->actualizarRoom();

    $room_U = new juegoController();
    $room_U->actualizarRoom();
    
    $controller = new actividadController();
    $controller->setActividadPlayer();
}else if (isset($_POST['verifyActifityOnline'])) {
    $room_U = new juegoController();
    $room_U->actualizarRoom();
    var_dump($_SESSION['room']);

    $controller = new actividadController();
    $controller->verifyStatus(json_decode($_POST['verifyActifityOnline']));
}else if (isset($_POST['getRoom'])) {
    $room_U = new juegoController();
    $room_U->actualizarRoom();

    $controller = new actividadController();
    $controller->getRoom();
}else if (isset($_POST['Partida'])) {
    $_SESSION['Start_'] = true;
    echo "her";
}
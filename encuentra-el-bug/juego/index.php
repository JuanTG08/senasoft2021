<?php

require_once 'config/db.php';
require_once 'controller/juegoController.php';
require_once 'controller/salaController.php';

session_start();

if (isset($_GET['room']) && isset($_GET['id'])) {
    $room = $_GET['room'];

    $sala = new salaController();
    $sala->getSala($room,2);

    if ($_GET['room'] === 'fffff') {
        $Jugador_ = new juegoController();

        if ($Jugador_->setJugadores() && isset($_SESSION['id_payer'])) {
            header('Location:../juego/');
        }
    }
}else if (isset($_SESSION['id_payer']) && isset($_SESSION['room'])) {
    $jugador = new juegoController();
    $jugador->indJugador();
}
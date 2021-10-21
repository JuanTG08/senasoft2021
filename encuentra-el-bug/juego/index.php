<?php
require_once 'config/parametros.php';
require_once 'config/db.php';
require_once 'utils/helpers.php';

// Se añaden los Controladores
require_once 'controller/juegoController.php';
require_once 'controller/salaController.php';
require_once 'controller/cartaController.php';
require_once 'controller/IndexController.php';

require_once 'views/main/head.php';

session_start();

if (empty($_GET) && empty($_POST) && empty($_SESSION)) {
    $Index = new indexController();
    $Index->index();
}

if (isset($_GET['room']) && isset($_GET['id'])) {
    $room = $_GET['room'];

    $sala = new salaController();
    $sala->getSala($room,2);

    if ($_GET['room'] === 'fffff') {
        $Jugador_ = new juegoController();

        if ($Jugador_->setJugadores() && isset($_SESSION['Jugador'])) {
            header('Location:../juego/');
        }
    }
}else if (isset($_SESSION['Jugador']) && isset($_SESSION['room'])) {
    $jugador = new juegoController();
    $jugador->indJugador();
}

if (isset($_GET['Salir'])) {
    $jugador = new juegoController();
    $jugador->salirJuego();
}

require_once 'views/main/footer.php';
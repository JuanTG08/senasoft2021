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

// Verificacion de Estado
if (juegoController::verifyStatus()) {
    // Inicio del Aplicativo
    if (empty($_GET) && empty($_POST) && empty($_SESSION)) {
        $Index = new indexController();
        $Index->index();
    }else{
        if (isset($_GET['create']) && isset($_POST['crear-sala'])) {
            echo 'Create';
        }else if (isset($_GET['unite'])) {
            require_once 'views/rooms/unite.php';
        }else if (isset($_GET['unite-room']) && isset($_POST['unite-room'])){
            if (isset($_POST['nickname']) && isset($_POST['room'])) {
                $jugador = new juegoController();
                $jugador->createJugador($_POST['nickname']);

                $ingresar = new salaController();
                $ingresar->getSala($_POST['room']);
            }else{
                // No se enviaron los campos
            }
        }
    }

    //var_dump($_SESSION);

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
    if (isset($_GET['Cartas'])) {
        $jugador = new cartaController();
        $jugador->obtenerCartas();
    }
}else{
    require_once 'views/rooms/inactivo.php';
    Utils::exitPlay();
}



require_once 'views/main/footer.php';
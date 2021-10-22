<?php

require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'utils/helpers.php';

require_once 'controller/preguntasController.php';

session_start();

if (isset($_POST['statusTurno'])) {
    $controller = new preguntasController();

    $controller->getTurnos();
}else if (isset($_POST['verifyIDs'])) {
    $controller = new preguntasController();
    if ($_POST['verifyIDs'] == $_SESSION['Jugador']->id_player) {
        echo 'preguntador';
    }else{
        $controller->getQuest();
    }
}else if (isset($_POST['renderQuestion'])) {
    $controller = new preguntasController();
    $controller->renderPregunta($_POST['renderQuestion']);
}
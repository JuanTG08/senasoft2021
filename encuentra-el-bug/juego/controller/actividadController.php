<?php
require_once 'model/actividad.php';
class actividadController{
    public function guardarEstadoJugador(){
        $state = new Actividad();
        $state->setIdRoom($_SESSION['room']->id_room);
        $state->setIdJugador($_SESSION['Jugador']->id_player);

        if ($state->verifyStatePlayer()) {
            $state->updateStatePlayer();
        }else{
            $state->setStatePlayer();
        }
        echo json_encode($state->selectStatesPlayers());
    }

    public function verifyStatus($status) {
        echo count($status);
    }
}
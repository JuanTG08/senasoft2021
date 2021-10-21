<?php

use function PHPSTORM_META\type;

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
        for ($i=0; $i < count($status); $i++) { 
            if ($status[$i][2] < date('H:i:s', time()-5)) {
                $change_status = new Actividad();
                $change_status->setIdJugador($status[$i][1]);
                $change_status->changeStatusPlayer();
                //echo "incativo".$status[$i][1];
            }
        }
    }
}
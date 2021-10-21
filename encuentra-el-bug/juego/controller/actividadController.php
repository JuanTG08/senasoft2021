<?php

use function PHPSTORM_META\type;

require_once 'model/actividad.php';
require_once 'model/jugador.php';

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
            if ($status[$i][2] < date('H:i:s', time()-10)) {
                $change_status = new Actividad();
                $change_status->setIdJugador($status[$i][1]);
                $change_status->changeStatusPlayer();
                //$change_status->deletePlayerOnlien();
                //echo "incativo".$status[$i][1];
            }
        }
    }

    public function diePlayers(){
        $change_status = new Actividad();
        $req_ju = new Jugador();
        $jugadores = $req_ju->getNamePlayer($_SESSION['room']->player_1,$_SESSION['room']->player_2,$_SESSION['room']->player_3,$_SESSION['room']->player_4)->fetch_all();
        if ($jugadores) {
            for ($i=0; $i < count($jugadores); $i++) { 
                if ($jugadores[$i][2] == "Inactivo") {
                    $change_status->setIdJugador($jugadores[$i][0]);
                    $change_status->deletePlayerOnlien();
                }
            }
        }
    }
}
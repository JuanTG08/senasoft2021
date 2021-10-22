<?php

require_once 'model/preguntas.php';
require_once 'config/db.php';

class preguntasController{
    public function identTurnos(){
        $turn = new Preguntas();

        $comp_turn = $turn->veriTurnos()->fetch_object();
        if ($comp_turn) {
            if ($comp_turn->id_turno_jugador == $_SESSION['Jugador']->id_player) {
                if ($turn->escojerPreguntas()->num_rows == 0) {
                    require_once 'views/Partida/modoEscojer.php';
                }else{
                    require_once 'views/Partida/loadResponse.php';
                }
            }else{
                require_once 'views/Partida/loadQuest.php';
            }
        }
    }

    public function setQuestion(){
        $preg = new Preguntas();

        if ($_POST['escojerPA'] == 0) {
            $setpreg = $preg->setQuestion($_POST['escojerPR'],$_POST['escojerM'],$_POST['escojerER']);
        }
    }
}
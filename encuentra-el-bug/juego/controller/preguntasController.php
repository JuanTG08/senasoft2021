<?php

require_once 'model/preguntas.php';
require_once 'config/db.php';

class preguntasController{
    public function identTurnos(){
        $turn = new Preguntas();

        $comp_turn = $turn->veriTurnos();

        if ($comp_turn) {
            echo "hola";
            var_dump($comp_turn);
        }
    }
}
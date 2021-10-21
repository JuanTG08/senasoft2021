<?php
require_once 'model/cartas.php';
// Se crea el controlador del juego
class cartacontroller{
    // Funcion para establecer a los jugadores
    public function obtenerCartas(){
        $cartas_ = new Cartas();
        $Cartas = $cartas_->getCartas();
        // Comprobamos si existe el jugador
        if ($Cartas) {
            $_SESSION['Cartas'] = $Cartas;
        }
        
    }

    public function Logica(){
        $cartas=[
            [1,2,3,4,5,7],
            [8,9,10,11,12],
            [13,14,15,16,17]
        ];
        $cartas_sistem=[];

    }


    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
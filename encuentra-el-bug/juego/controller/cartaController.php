<?php
require_once 'model/jugador.php';
// Se crea el controlador del juego
class cartacontroller{
    // Funcion para establecer a los jugadores
    public function setCartas(){
        $cartas_ = new Cartas();
        $Cartas = $cartas_->getCartas();
        // Comprobamos si existe el jugador
        if ($Cartas) {
            $_SESSION['Cartas'] = $Cartas;
        }
    }

    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
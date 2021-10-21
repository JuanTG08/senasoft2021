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
        var_dump( $_SESSION['Cartas'][3]);
    }

    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
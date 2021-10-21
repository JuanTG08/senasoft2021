<?php
require_once 'model/jugador.php';
// Se crea el controlador del juego
class juegoController{
    // Funcion para establecer a los jugadores
    public function setJugadores(){
        $response = false;
        $id_player = trim($_GET['id']);

        $Jugador_ = new Jugador();
        $Jugador_->setId($id_player);
        $jugador = $Jugador_->veryIdPlayer();
        // Comprobamos si existe el jugador
        if ($jugador && !isset($_SESSION['Jugador'])) {
            $_SESSION['Jugador'] = $jugador;
            $response = true;
        }
        return $response;
    }
    public function createJugador($nickname){
        if (isset($nickname)) {
            $response = false;

            $Jugador_ = new Jugador();
            $Jugador_->setName($nickname);
            $jugador = $Jugador_->createPlayer();
            // Comprobamos si existe el jugador
            if ($jugador && !isset($_SESSION['Jugador'])) {
                $_SESSION['Jugador'] = $jugador;
                $response = true;
            }
            return $response;
        }
    }

    public function indJugador(){
        $posicion = false;
        if (isset($_SESSION['Jugador']) && isset($_SESSION['room'])) {
            $name_ = new Jugador();
            $name_ = $name_->getNamePlayer($_SESSION['room']->player_1,$_SESSION['room']->player_2,$_SESSION['room']->player_3,$_SESSION['room']->player_4);
            
            if ($name_) {
                $_SESSION['Jugadores'] = $name_;
            }
            $player = $_SESSION['Jugador']->id_player;
            $room = $_SESSION['room'];

            $obj_jug = {
                $j1 -> $room->player_1;
            }
            
            switch ($player) {
                case $room->player_1:
                    $posicion = 'Jugador 1';
                    break;
                case $room->player_2:
                    $posicion = 'Jugador 2';
                    break;
                case $room->player_3:
                    $posicion = 'Jugador 3';
                    break;
                case $room->player_4:
                    $posicion = 'Jugador 4';
                    break;
                default:
                    Utils::deleteSession('Jugador');
                    Utils::deleteSession('room');
                    header('Location:../juego/');
                    break;
            }
            require_once 'views/juego/titulo.php';
            require_once 'views/juego/actividad.php';
        }
    }

    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
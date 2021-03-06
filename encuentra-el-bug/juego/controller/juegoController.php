<?php
require_once 'model/jugador.php';
require_once 'model/rooms.php';
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
    //crear jugador
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
    //actualizar los jugadores
    public function indJugador(){
        $this->actualizarRoom();
        $iniciador = false;
        $posicion = false;
        if (isset($_SESSION['Jugador']) && isset($_SESSION['room'])) {
            $name_ = new Jugador();
            $name_ = $name_->getNamePlayer($_SESSION['room']->player_1,$_SESSION['room']->player_2,$_SESSION['room']->player_3,$_SESSION['room']->player_4);
            
            if ($name_) {
                $_SESSION['Jugadores'] = $name_;
            }
            $player = $_SESSION['Jugador']->id_player;
            $room = $_SESSION['room'];
            
            switch ($player) {
                case $room->player_1:
                    $iniciador = true;
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
                    Utils::exitPlay();
                    header('Location:../juego/');
                    break;
            }
            echo '<div id="cpanel-acti">';
                require_once 'views/juego/titulo.php';
                require_once 'views/juego/actividad.php';
            echo '</div>';
        }
    }
     //actualizar la sala
    public function actualizarRoom(){
        $room = new Room();
        $room->setId($_SESSION['room']->id_room);
        $room->setHexadecimal($_SESSION['room']->hexadecimal);
        $getRoom = $room->getRoom();

        if ($getRoom) {
            $_SESSION['room'] = "";
            $_SESSION['room'] = $getRoom;

        }
    }
    //verificar el estado del jugador
    public static function verifyStatus() {
        if (isset($_SESSION['Jugador'])) {
            $jugador = new Jugador();
            $jugador->setId($_SESSION['Jugador']->id_player);
            $very = $jugador->veryIdPlayer();

            if ($very) {
                if ($very->status == 'Inactivo') {
                    Utils::exitPlay();
                }
            }
        }
    }
    //actualizar la sala
    public function doomActualizar(){
        $this->actualizarRoom();
        var_dump($_SESSION['room']);
    }
    //salir del juego
    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
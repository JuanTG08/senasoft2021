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

        // Comprobamos si existe el jugador
        if ($Jugador_->veryIdPlayer()) {
            $_SESSION['id_payer'] = $id_player;
            $response = true;
        }
        return $response;
    }

    public function indJugador(){
        if (isset($_SESSION['id_payer']) && isset($_SESSION['room'])) {
            $player = $_SESSION['id_payer'];
            $room = $_SESSION['room'];
            switch ($player) {
                case $room->player_1:
                    echo 'Jugador 1';
                    break;
                case $room->player_2:
                    echo 'Jugador 2';
                    break;
                case $room->player_3:
                    echo 'Jugador 3';
                    break;
                case $room->player_4:
                    echo 'Jugador 4';
                    break;
                default:
                    echo "No se Puede";
                    break;
            }
        }
    }
}
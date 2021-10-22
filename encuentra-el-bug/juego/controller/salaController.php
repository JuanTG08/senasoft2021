<?php
require_once 'model/rooms.php';
class salaController{
    //establecer si esta llena la sala
    public function getSala($room){
        $very = false;
        $sala_ = new Room();
        $sala_->setHexadecimal($room);
        $veri_room = $sala_->getOneRoom();

        if ($veri_room && $_SESSION['Jugador']) {
            if ($veri_room->status === "Activo") {
                $id_room = $veri_room->id_room;
                $sala_->setId($id_room);
                if ($veri_room->player_1 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_1='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_2 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_2='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_3 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_3='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_4 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_4='".$_SESSION['Jugador']->id_player."'");
                }else{
                    echo "<script>alert('Sala Llena')</script>";
                }
                $veri_room = $sala_->getOneRoom();
            }
        }

        if ($very) {
            $_SESSION['room'] = $veri_room;
            header('Location:'.base);
        }else{
            Utils::exitPlay();
            header('Location:'.base.'?unite');
        }
    }
    public function createSala($nick,$hexa){
        $sala_ = new Room();
        $sala_->setHexadecimal($hexa);
        $veri_room = $sala_->getOneRoom();

        if ($veri_room) {
            if ($veri_room->status === "Activo") {
                $id_room = $veri_room->id_room;
                $sala_->setId($id_room);
                if ($veri_room->player_1 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_1='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_2 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_2='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_3 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_3='".$_SESSION['Jugador']->id_player."'");
                }else if ($veri_room->player_4 == null) {
                    $very = true;
                    $set_jugador = $sala_->setPlayer("player_4='".$_SESSION['Jugador']->id_player."'");
                }else{
                    echo "<script>alert('Sala Llena')</script>";
                }
                $veri_room = $sala_->getOneRoom();
            }
        }

        if ($very) {
            $_SESSION['room'] = $veri_room;
            header('Location:'.base);
        }else{
            Utils::exitPlay();
            header('Location:'.base.'?create');
        }
    }
}
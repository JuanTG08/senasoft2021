<?php
require_once 'model/rooms.php';
class salaController{
    public function getSala($room,$id_room){
        $sala_ = new Room();
        $sala_->setId($id_room);
        $sala_->setHexadecimal($room);

        $sala = $sala_->getRoom();
        if ($sala) {
            $_SESSION['room'] = $sala;
        }else{
            echo "noaaaaaa";
        }
    }
}
<?php

class Actividad{
    private $id_room;
    private $id_jugador;
    private $tiempo;
    private $db;



    public function setIdRoom($id_room){
        $this->id_room=$id_room;
    }
    public function getIdRoom(){
       return $this->id_room;
    }

    public function setIdJugador($id_jugador){
        $this->id_jugador=$id_jugador;
    }
    public function getIdJugador(){
       return $this->id_jugador;
    }

    public function getId(){
       return $this->tiempo;
    }

    public function __construct(){
        $this->db = Conexion::conect();
    }

    public function setStatePlayer(){
        $sql = $this->db->query("INSERT INTO actividad VALUES ('{$this->getIdRoom()}','{$this->getIdJugador()}','".date('H:i:s', time())."')");
    }
    public function updateStatePlayer(){
        $sql = $this->db->query("UPDATE actividad SET tiempo='".date('H:i:s', time())."' WHERE id_room='{$this->getIdRoom()}' AND id_jugador='{$this->getIdJugador()}'");
    }

    public function verifyStatePlayer(){
        $response = false;
        $sql = $this->db->query("SELECT * FROM actividad WHERE id_room='{$this->getIdRoom()}' AND id_jugador='{$this->getIdJugador()}'");
        if ($sql->num_rows > 0) {
            $response = true;
        }
        return $response;
    }

    public function selectStatesPlayers(){
        $response = false;
        $sql = $this->db->query("SELECT * FROM actividad WHERE id_room='{$this->getIdRoom()}'");
        if ($sql->num_rows > 0) {
            $response = $sql->fetch_all();
        }
        return $response;
    }
}
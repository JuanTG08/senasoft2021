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

    public function getStatusPlayers($id_1,$id_2,$id_3,$id_4){
        $response = false;
        $sql = $this->db->query("SELECT * FROM players WHERE id_player='{$id_1}' OR id_player='{$id_2}' OR id_player='{$id_3}' OR id_player='{$id_4}'");
        if ($sql->num_rows > 0) {
            $response = $sql->fetch_all();
        }
        return $response;
    }

    public function deleateInactivePlayers($id){
        if ($_SESSION['room']->player_1 == $id) {
            $posicion = "player_1";
        }else if ($_SESSION['room']->player_2 == $id) {
            $posicion = "player_2";
        }else if ($_SESSION['room']->player_3 == $id) {
            $posicion = "player_3";
        }else if ($_SESSION['room']->player_4 == $id) {
            $posicion = "player_4";
        }
        //var_dump($_SESSION['room']);
        $sql = $this->db->query("UPDATE room SET ".$posicion."=NULL WHERE id_room=".$_SESSION['room']->id_room);
    }

    /*
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

    public function deletePlayerOnlien() {
        $response = false;
        $posicion = false;
        if ($this->getIdJugador() && $_SESSION['room']->id_room) {
            if ($_SESSION['room']->player_1 = $this->getId()) {
                $posicion = "player_1";
            }else if ($_SESSION['room']->player_2 = $this->getId()) {
                $posicion = "player_2";
            }else if ($_SESSION['room']->player_3 = $this->getId()) {
                $posicion = "player_3";
            }else if ($_SESSION['room']->player_4 = $this->getId()) {
                $posicion = "player_4";
            }
            $sql_u = $this->db->query("UPDATE room SET ".$posicion."=NULL WHERE id_room='{$_SESSION['room']->id_room}'");

            //var_dump($_SESSION['room']);
            if ($sql_u) {
                $response = true;
            }
        }
        return $response;
    }

    public function changeStatusPlayer(){
        $sql = $this->db->query("UPDATE players SET status='Inactivo' WHERE id_player='{$this->getIdJugador()}'");
    }
    */
}
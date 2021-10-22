<?php

class Preguntas{
    private $db;

    public function __construct(){
        $this->db=Conexion::conect();
    }

    public function veriTurnos(){
        $comp = false;
        $select_tur = $this->db->query("SELECT * FROM turnos WHERE id_room=".$_SESSION['room']->id_room);
        
        if ($select_tur) {
            if ($select_tur->num_rows == 0) {
                $_SESSION['room']->id_room;
                $create_reg = $this->db->query("INSERT INTO turnos VALUES ('{$_SESSION['room']->id_room}','{$_SESSION['room']->player_1}',0,0,0,0)");
            }
            $comp = $this->db->query("SELECT * FROM turnos WHERE id_room=".$_SESSION['room']->id_room);
        }

        return $comp;
    }

    public function actualizarConfirm(){
        $comp = false;
        $posicion = "";

        if ($_SESSION["room"]->player_1 == $_SESSION['Jugador']->id_player) {
            $posicion += "j1";
        }else if ($_SESSION["room"]->player_2 == $_SESSION['Jugador']->id_player) {
            $posicion += "j2";
        }else if ($_SESSION["room"]->player_3 == $_SESSION['Jugador']->id_player) {
            $posicion += "j3";
        }else if ($_SESSION["room"]->player_4 == $_SESSION['Jugador']->id_player) {
            $posicion += "j4";
        }

        $sql = $this->db->query("UPDATE turnos SET {$posicion}=1 WHERE id_sala=".$_SESSION['room']->id_room);
    }

    public function escojerPreguntas(){
        return $this->db->query("SELECT * FROM preguntas WHERE id_sala=".$_SESSION['room']->id_room);
    }

    public function setQuestion($programador, $modelo, $error){
        $comp = false;
        $select_tur = $this->db->query("SELECT * FROM preguntas WHERE id_sala=".$_SESSION['room']->id_room);


        if ($select_tur->num_rows == 0 || $select_tur ==null) {
            $create_reg = $this->db->query("INSERT INTO preguntas VALUES ('{$_SESSION['room']->id_room}',{$programador},{$modelo},{$error})");
            if ($create_reg) {
                $comp = true;
            }
        }

        return $comp;
    }


    public function getTurnos(){
        return $this->db->query("SELECT * FROM turnos WHERE id_room=".$_SESSION['room']->id_room)->fetch_object();
    }
}
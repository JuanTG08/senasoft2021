<?php

class Preguntas{
    private $db;

    public function __construct(){
        $this->db=Conexion::conect();
    }

    public function veriTurnos(){
        var_dump($_SESSION['room']);
        $comp = false;
        $select_tur = $this->db->query("SELECT * FROM turnos WHERE id_sala=".$_SESSION['room']->id_room);

        if ($select_tur->count_rows == 0) {
            $create_reg = $this->db->query("INSERT INTO turnos VALUES ('{$_SESSION['room']->id_room}','{$_SESSION['room']->player_1}',0,0,0,0)");
            
            $comp = $this->db->query("SELECT * FROM turnos WHERE id_sala=".$_SESSION['room']->id_room);
        }

        return $comp;
    }
}
<?php

class Jugador{
    private $id;
    private $db;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
       return $this->id;
    }
    
    
    public function __construct(){
        $this->db = Conexion::conect();
    }

    public function veryIdPlayer(){
        return ($this->db->query("SELECT id_player FROM players WHERE id_player='{$this->getId()}'")) ? true : false;
    }
}
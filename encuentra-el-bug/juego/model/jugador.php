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
    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
       return $this->name;
    }
    
    
    public function __construct(){
        $this->db = Conexion::conect();
    }

    public function veryIdPlayer(){
        $response = false;
        $query = $this->db->query("SELECT * FROM players WHERE id_player='{$this->getId()}'");
        if ($query) {
            $response = $query->fetch_object();
        }
        return $response;
    }
    public function createPlayer(){
		$sql="INSERT INTO players VALUES (NULL,'{$this->getName()}','Activo');";
		$save=$this->db->query($sql);
        $jugador = $this->db->query('SELECT * FROM players WHERE id_player=LAST_INSERT_ID()');

		$result=false;
		if ($save && $jugador) {
			$result=$jugador->fetch_object();
		}
		return $result;
	}
    
    public function getNamePlayer($id_1,$id_2,$id_3,$id_4){
        $response = false;
        $query = $this->db->query("SELECT * FROM players WHERE id_player='{$id_1}' OR id_player='{$id_2}' OR id_player='{$id_3}' OR id_player='{$id_4}'");
        if ($query) {
            $response = $query;
        }
        return $response;
	}
}
<?php
class Room{
    private $id;
    private $hexadecimal;
    private $db;

    public function setId($id){
        $this->id=$id;
    }
    public function setHexadecimal($hexadecimal){
        $this->hexadecimal=$hexadecimal;
    }
    public function getId(){
       return $this->id;
    }
    public function getHexadecimal(){
       return $this->hexadecimal;
    }
    
    
    public function __construct(){
        $this->db = Conexion::conect();
    }

    public function getRoom(){
        $response = false;
        $query = $this->db->query("SELECT * FROM room WHERE hexadecimal='{$this->getHexadecimal()}' AND id_room='{$this->getId()}'");
        if ($query) {
            $response = $query->fetch_object();
        }
        return $response;
    }
    public function getOneRoom(){
        $response = false;
        $query = $this->db->query("SELECT * FROM room WHERE hexadecimal='{$this->getHexadecimal()}'");
        if ($query) {
            $response = $query->fetch_object();
        }
        return $response;
    }

    public function setPlayer($sql_player){
        $response = false;
        $query = $this->db->query("UPDATE room SET ".$sql_player." WHERE id_room='{$this->getId()}'");

        if ($query) {
            $response = true;
        }
        return $response;
    }

    public function createRoom(){
		$sql="INSERT INTO room VALUES (NULL,'{$this->getHexadecimal()}',NULL,NULL,NULL,NULL,'Activo');";
		$save=$this->db->query($sql);
        $jugador = $this->db->query('SELECT * FROM room WHERE id_room=LAST_INSERT_ID()');

		$result=false;
		if ($save && $jugador) {
			$result=$jugador->fetch_object();
		}
		return $result;
	}
}
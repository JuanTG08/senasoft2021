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
}
<?php
class Cartas{
    private $id;
    private $titulo;
    private $imagen;
    private $categoria;
    private $db;

    public function setId($id){
        $this->id=$id;
    }
    public function setHexadecimal($hexadecimal){
        $this->hexadecimal=$hexadecimal;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function setImagen($imagen){
        $this->imagen=$imagen;
    }
    public function setCategoria($categoria){
        $this->categoria=$categoria;
    }
    public function getId(){
       return $this->id;
    }
    public function getTitulo(){
       return $this->titulo;
    }
    public function getImagen(){
        return $this->imagen;
     }
     public function getCategoria(){
        return $this->categoria;
     }
    
    
    public function __construct(){
        $this->db = Conexion::conect();
    }

    public function getCartas(){
        $response = false;
        $query = $this->db->query("SELECT * FROM cartas");
        if ($query) {
            $response = $query->fetch_all();
        }
        return $response;
    }
}
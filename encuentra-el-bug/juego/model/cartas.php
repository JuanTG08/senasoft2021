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
    public function getCartasSistem($persona,$modulo,$error){
        $response = false;
        $query = $this->db->query("SELECT * FROM cartas WHERE id_carta='{$persona}' OR id_carta='{$modulo}' OR id_carta='{$error}'");
        if ($query) {
            $response = $query->fetch_all();
        }
        return $response;
    }
    public function getCartasAsig($card1,$card2,$card3,$card4){
        $response = false;
        $query = $this->db->query("SELECT * FROM cartas WHERE id_carta='{$card1}' OR id_carta='{$card2}' OR id_carta='{$card3}' OR id_carta='{$card4}'");
        if ($query) {
            $response = $query->fetch_all();
        }
        return $response;
    }
    
    public function SetCartasSistem(){
        $query = $this->db->query("SELECT * FROM cartas_sistem WHERE id_room='fffff'");
        
        if (count($query->fetch_all()) >0 ) {
            $sql="UPDATE cartas_sistem SET  id_carta1='{$_SESSION['CartasSistem'][0][0]}',id_carta2='{$_SESSION['CartasSistem'][1][0]}',id_carta3='{$_SESSION['CartasSistem'][2][0]}' WHERE id_room='fffff' ";
            $save=$this->db->query($sql);
        }else{
            $sql="INSERT INTO cartas_sistem VALUES ('fffff','{$_SESSION['CartasSistem'][0][0]}','{$_SESSION['CartasSistem'][1][0]}','{$_SESSION['CartasSistem'][2][0]}');";
            $save=$this->db->query($sql);
        }
		$result=false;
		if ($save) {
			$result=true;
		}
		return $result;
    }
    // public function SetCartasAsig($i){
    //     $query = $this->db->query("SELECT * FROM cartas_asig WHERE id_jugador='{$i}'");
        
    //     if (count($query->fetch_all()) >0 ) {
    //         $sql="UPDATE cartas_sistem SET  id_carta1='{$_SESSION['CartasSistem'][0][0]}',id_carta2='{$_SESSION['CartasSistem'][1][0]}',id_carta3='{$_SESSION['CartasSistem'][2][0]}' WHERE id_room='fffff' ";
    //         $save=$this->db->query($sql);
    //     }else{
    //         $sql="INSERT INTO cartas_sistem VALUES ('fffff','{$_SESSION['CartasSistem'][0][0]}','{$_SESSION['CartasSistem'][1][0]}','{$_SESSION['CartasSistem'][2][0]}');";
    //         $save=$this->db->query($sql);
    //     }
	// 	$result=false;
	// 	if ($save) {
	// 		$result=true;
	// 	}
	// 	return $result;
    // }
}
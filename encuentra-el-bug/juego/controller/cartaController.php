<?php
require_once 'model/cartas.php';
// Se crea el controlador del juego
class cartacontroller{
    public function Logica(){
        $cartas=[
            [1,2,3,4,5,6,7],
            [8,9,10,11,12,13],
            [14,15,16,17,18,19]
        ];
        $indice1 = rand(0,6);
        $indice2 = rand(0,5);
        $indice3 = rand(0,5);
        $cartas_sistem=[$cartas[0][$indice1], $cartas[1][$indice2], $cartas[2][$indice3]];

        $cartas_asign=[];
        
        var_dump( json_encode($cartas_sistem));
        while (count($cartas_asign) <= 3) {
            
            $num=rand(1,19);
             if ($num != $cartas_sistem[0] && $num != $cartas_sistem[1] && $num != $cartas_sistem[2]) {
                array_push($cartas_asign, $num);
             }
           
        }
        var_dump( json_encode($cartas_asign));
        // $cartas_select=[];
    }
    // Funcion para establecer a los jugadores
    public function obtenerCartas(){
        $cartas_ = new Cartas();
        $Cartas = $cartas_->getCartas();
        // Comprobamos si existe el jugador
        if ($Cartas) {
            $_SESSION['Cartas'] = $Cartas;
        }
        $this->Logica();
       
    }

    

    public function salirJuego(){
        Utils::exitPlay();
        header('Location:../juego/');
    }
}
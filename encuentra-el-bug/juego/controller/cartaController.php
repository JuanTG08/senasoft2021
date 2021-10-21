<?php
require_once 'model/cartas.php';
// Se crea el controlador del juego
class cartacontroller{
    public function Logica(){
        $cartas=[
            [1,2,3,4,5,7],
            [8,9,10,11,12],
            [13,14,15,16,17]
        ];
        $cartas_sistem1=[];
        array_push($cartas_sistem1, rand(1,7));
        array_push($cartas_sistem1, rand(1,6));
        array_push($cartas_sistem1, rand(1,6));
        $cartas_sistem=[$cartas[0][$cartas_sistem1[0]], $cartas[0][$cartas_sistem1[1]], $cartas[0][$cartas_sistem1[2]]];

        $cartas_asign=[];
        for ($i=0; $i < 4; $i++) {
            array_push($cartas_asign, rand(1,19));
            $r=false;
            while ($r == true) {
                if ($cartas_asign[$i] != $cartas_sistem[0]) {
                    if ($cartas_asign[$i] != $cartas_sistem[1]) {
                        if ($cartas_asign[$i] != $cartas_sistem[2]) {
                            $cartas_asign=rand(1,19);
                            $r=true;
                        }
                    }
                }
            }
            $r=false;
        }

        $cartas_select=[];
        
        var_dump($cartas_sistem);
        var_dump($cartas_asign);


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
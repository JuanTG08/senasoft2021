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
        $i=count($cartas_asign);
        for ($i; $i < 8; $i++) { 
            $num=rand(1,19);
            
            if ( $num == $cartas_sistem[0] or $num == $cartas_sistem[1] or $num == $cartas_sistem[2]) {
            }elseif ($num != $cartas_sistem[0] && $num != $cartas_sistem[1] && $num != $cartas_sistem[2]) {
                array_push($cartas_asign, rand(1,19));
            }
            $i=count($cartas_asign);
        }
        var_dump( json_encode($cartas_sistem));
        var_dump( json_encode($cartas_asign));

        

        // for ($i=0; $i < 4; $i++) {
        //     array_push($cartas_asign, rand(1,19));
        //     $r=false;
        //     while ($r == true) {
        //         if ($cartas_asign[$i] != $cartas_sistem[0]) {
        //             if ($cartas_asign[$i] != $cartas_sistem[1]) {
        //                 if ($cartas_asign[$i] != $cartas_sistem[2]) {
        //                     for ($j=0; $j < count($cartas_asign); $j++) { 
        //                         if ($cartas_asign[$i] != $cartas_asign[$j]) {
        //                             $cartas_asign=rand(1,19);
        //                             $r=true;
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        //     $r=false;
        // }

        $cartas_select=[];
        
        


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
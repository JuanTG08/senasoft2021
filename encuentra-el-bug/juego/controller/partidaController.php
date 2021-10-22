
<?php
require_once 'model/cartas.php';
class partidaController{
    public function index(){
        if ( isset($_SESSION['ConfirmGame']) ) {
            $_SESSION['ConfirmGame']=true;
        }else{
            $_SESSION['ConfirmGame']=false;
        }
        $this->obtenerCartas();

        require_once 'views/Partida/main.php';
        require_once 'views/Partida/modoEscojer.php';
        require_once 'views/Partida/cartasEscojer.php';
    }
    public function obtenerCartas(){
        if ( $_SESSION['ConfirmGame']===false) {
            $cartas_ = new Cartas();
            $Cartas = $cartas_->getCartas();
            // Comprobamos si existe el jugador
            if ($Cartas) {
                $_SESSION['Cartas'] = $Cartas;
                // var_dump($_SESSION['Cartas']);
            }
            $cartas=[
                1,2,3,4,5,6,7,
                8,9,10,11,12,13,
                14,15,16,17,18,19
            ];
    
            $cartas_total = [$cartas[rand(0,6)], $cartas[rand(7,12)], $cartas[rand(13,18)]];
    
            for ($i=0; $i <= 18; $i++) {
                for ($j=0; $j <= 30; $j++) { 
                    $rand_num = rand(1,19);
                    if (!in_array($rand_num,$cartas_total)) {
                        array_push($cartas_total,$rand_num);
                        break;
                    }
                }
            }

            $CartasSistem = $cartas_->getCartasSistem($cartas_total[0],$cartas_total[1],$cartas_total[2]);
            // Comprobamos si existe el jugador
            if ($CartasSistem) {
                $_SESSION['CartasSistem'] = $CartasSistem;
                $cartas_->setCartasSistem();
                
            }

            // if (count($_SESSION['Jugadores'])==1) {
            //     # code...
            // }
            $_SESSION['CartasAsign']=[];
            for ($i=0; $i < 4; $i++) {
                $CartasAsig = $cartas_->getCartasAsig($cartas_total[3],$cartas_total[4],$cartas_total[5],$cartas_total[6]);
                if ($CartasAsig) {
                    array_push($_SESSION['CartasAsign'], $CartasAsig);
                }
                $_SESSION['CartasJ'.$i.'']=$_SESSION['CartasAsign'][0][$i];
                // $cartas_->setCartasAsig(  $_SESSION['CartasJ'.$i.'']);
                var_dump( json_encode( $_SESSION['CartasJ'.$i.'']));

            }

            // var_dump($_SESSION['CartasJ3']);


            $_SESSION['ConfirmGame']=true;
        }
       
    }
}
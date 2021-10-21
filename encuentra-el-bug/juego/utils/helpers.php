<?php
class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name]=null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function exitPlay(){
        if (isset($_SESSION['Jugador'])) {
            Utils::deleteSession('Jugador');
        }
        if (isset($_SESSION['room'])) {
            Utils::deleteSession('room');
        }
        if (isset($_SESSION['Jugadores'])) {
            Utils::deleteSession('Jugadores');
        }
    }
}
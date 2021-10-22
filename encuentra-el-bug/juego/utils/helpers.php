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
        if (isset($_SESSION['Cartas'])) {
            Utils::deleteSession('Cartas');
        }
        if (isset($_SESSION['Start_'])) {
            Utils::deleteSession('Start_');
        }
        if (isset($_SESSION['Start'])) {
            Utils::deleteSession('Start');
        }
        if (isset($_SESSION['ConfirmGame'])) {
            Utils::deleteSession('ConfirmGame');
        }
        if (isset($_SESSION['CartasSistem'])) {
            Utils::deleteSession('CartasSistem');
        }
        if (isset($_SESSION['CartasAsign'])) {
            Utils::deleteSession('CartasAsign');
        }
        if (isset($_SESSION['CartasInicio'])) {
            Utils::deleteSession('CartasInicio');
        }
        if (isset($_SESSION['CartasJ0'])) {
            Utils::deleteSession('CartasJ0');
        }
        if (isset($_SESSION['CartasJ1'])) {
            Utils::deleteSession('CartasJ1');
        }
        if (isset($_SESSION['CartasJ2'])) {
            Utils::deleteSession('CartasJ2');
        }
        if (isset($_SESSION['CartasJ3'])) {
            Utils::deleteSession('CartasJ3');
        }
    }
}
<?php

class Conexion{
    public static function conect(){
        $conect = new mysqli('localhost','root','','senasoft');
        $conect->query("SET NAMES 'utf8'");

        return $conect;
    }
}

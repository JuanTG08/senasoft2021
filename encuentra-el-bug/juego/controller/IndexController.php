<?php
class indexController{
    public function index(){
        require_once 'views/player/home.php';
    }
    public function refrescarTodo(){
        $this->index();
    }
}
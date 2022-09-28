<?php

class usuario{
    public $nombre;
    public $apellido;

    public function mostrar(){
        return '"'.$this->nombre . ' ' . $this -> apellido.'"'; 
    }
}

?>
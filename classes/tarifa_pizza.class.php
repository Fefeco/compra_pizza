<?php

class tarifa_pizza{
    public $nombre_pizza;
    public $precio_mediana;
    public $precio_normal;
    public $precio_familiar;

    public function __construct( $_nombre_pizza, $_precio_mediana, $_precio_normal, $_precio_familiar )
    {
        $this->nombre_pizza = $_nombre_pizza;
        $this->precio_mediana = $_precio_mediana;
        $this->precio_normal = $_precio_normal;
        $this->precio_familiar = $_precio_familiar;
    }
}
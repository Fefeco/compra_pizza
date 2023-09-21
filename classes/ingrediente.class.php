<?php

class ingrediente {
    private $nombre;
    private $cantidad;
    private $precio;

    public function __construct( $_nombre, $_cantidad, $_precio )
    {
        $this->nombre = $_nombre;
        $this->cantidad = $_cantidad;
        $this->precio = $_precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
}
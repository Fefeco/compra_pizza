<?php

class pizza {
    private $nombre;
    private $tipo;
    private $precio;
    private $ingredientes = array();

    public function __construct( $_nombre, $_tipo, $_precio )
    {
        $this->nombre = $_nombre;
        $this->tipo = $_tipo;
        $this->precio = $_precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    public function setIngredientes( $ingrediente )
    {
        array_push( $this->ingredientes, $ingrediente );
    }

    public function calcular_precio() : float
    {
        $total = $this->precio;
        foreach( $this->ingredientes as $ingrediente ){
            $total += $ingrediente->getPrecio();
        }
        return $total;
    }
}
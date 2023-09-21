<?php

    class tarifa_ingrediente {
        public $nombre;
        public $precio_simple;
        public $precio_doble;

        public function __construct( $_nombre, $_precio_simple, $_precio_doble )
        {
            $this->nombre = $_nombre;
            $this->precio_simple = $_precio_simple;
            $this->precio_doble = $_precio_doble;
        }
    }
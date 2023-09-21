<?php

spl_autoload_register( function( $class ) {
    $ruta = __DIR__.'/../classes/'.$class.'.class.php';
    include_once $ruta;
} );

$_pizzas = [];
$_pizzas['napolitana'] = new tarifa_pizza( 'napolitana', 4.00, 4.50, 5.20 );
$_pizzas['new york'] = new tarifa_pizza( 'new york', 4.20, 4.80, 5.50 );
$_pizzas['pizza de taglio'] = new tarifa_pizza( 'pizza de taglio', 5.20, 5.80, 6.50 );
$_pizzas['argentina'] = new tarifa_pizza( 'argentina', 6.00, 6.80, 7.20 );
$_pizzas['chicago'] = new tarifa_pizza( 'chicago', 4.20, 4.50, 5.00 );
$_pizzas['sfincione'] = new tarifa_pizza( 'sfincione', 5.80, 6.20, 6.50 );

$_ingrediente = [];
$_ingrediente['anchoas'] = new tarifa_ingrediente( 'anchoas', 0.25, 0.3 );
$_ingrediente['atun'] = new tarifa_ingrediente( 'atun', 0.25, 0.35 );
$_ingrediente['bacon'] = new tarifa_ingrediente( 'bacon', 0.2, 0.4 );
$_ingrediente['carne vacuno'] = new tarifa_ingrediente( 'carne vacuno', 0.2,  0.45 );
$_ingrediente['cebolla'] = new tarifa_ingrediente( 'cebolla', 0.1, 0.15 );
$_ingrediente['cerdo'] = new tarifa_ingrediente( 'cerdo', 0.4, 0.65 );
$_ingrediente['champignon'] = new tarifa_ingrediente( 'champignon', 0.2, 0.4 );
$_ingrediente['gambas'] = new tarifa_ingrediente( 'gambas', 0.3, 0.45 );
$_ingrediente['pepperoni'] = new tarifa_ingrediente( 'pepperoni', 0.15, 0.3 );
$_ingrediente['pimientos'] = new tarifa_ingrediente( 'pimientos', 0.2, 0.25 );
$_ingrediente['jalapenos'] = new tarifa_ingrediente( 'jalapenos', 0.15, 0.25 );
$_ingrediente['pollo marinado'] = new tarifa_ingrediente( 'pollo marinado', 0.35, 0.45 );
$_ingrediente['queso cheddar'] = new tarifa_ingrediente( 'queso cheddar', 0.25, 0.5 );
$_ingrediente['queso provolone'] = new tarifa_ingrediente( 'queso provolone', 0.3, 0.45 );
$_ingrediente['queso suizo'] = new tarifa_ingrediente( 'queso suizo', 0.4, 0.65 );
$_ingrediente['salchichas'] = new tarifa_ingrediente( 'salchichas', 0.25, 0.5 );
$_ingrediente['tomate natural'] = new tarifa_ingrediente( 'tomate natural', 0.15, 0.25 );
$_ingrediente['jamon york'] = new tarifa_ingrediente( 'jamon york', 0.15, 0.25 );
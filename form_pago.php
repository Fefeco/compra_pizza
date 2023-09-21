<?php

    session_start();

    spl_autoload_register( function( $class ) {
        $ruta = __DIR__.'/classes/'.$class.'.class.php';
        if( file_exists( $ruta ) ){
            include_once $ruta;
        }
    } );

    include_once 'modelos/datos.php';

    $nombre = $_SESSION['nombre_pizza'];
    $tipo = $_SESSION['tipo'];
    $precio_tipo = 'precio_'.$tipo;
    $precio = $_pizzas[$nombre]->$precio_tipo;
    $nueva_pizza = new pizza( $nombre, $tipo, $precio );

    $ingredientes = $_SESSION['ingredientes'];
    foreach( $ingredientes as $ingrediente => $cantidad ){
        $precio_cantidad = 'precio_'.$cantidad;
        $precio_ingrediente = $_ingrediente[$ingrediente]->$precio_cantidad;

        $nueva_pizza->setIngredientes( new ingrediente( $ingrediente, $cantidad, $precio_ingrediente ) );
    }
    unset( $ingredientes, $nombre, $tipo, $precio_tipo, $precio );
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGO</title>
</head>
<body>
    <main>
        <section>
            <h1>PIZZA</h1>
            <table>
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>TIPO</th>
                        <th>PRECIO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= ucfirst( $nueva_pizza->getNombre() ); ?></td>
                        <td><?= ucfirst( $nueva_pizza->getTipo() ); ?></td>
                        <td><?= sprintf( '%.2f €', $nueva_pizza->getPrecio() ) ?></td>
                    </tr>
                </tbody>
            </table>

            <?php $ingredientes = $nueva_pizza->getIngredientes(); ?>
            <?php if( !empty( $ingredientes ) ) : ?>
                <h2>INGREDIENTES</h2>
                <table>
                    <thead>
                        <tr>
                            <th>INGREDIENTE</th>
                            <th>CANTIDAD</th>
                            <th>PRECIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $ingredientes as $obj_ingrediente ) : ?>
                            <tr>
                                <td><?= ucfirst( $obj_ingrediente->getNombre() ) ?></td>
                                <td><?= ucfirst( $obj_ingrediente->getCantidad() ) ?></td>
                                <td><?= sprintf( '%.2f €', $obj_ingrediente->getPrecio() ) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <p>PRECIO <?= $nueva_pizza->calcular_precio() ?> EUROS</p>
        </section>
    </main>
</body>
</html>
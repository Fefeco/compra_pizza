<?php

    include_once 'modelos/datos.php';
            
    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
        session_start();

        // Control de errores
        if( empty( $_POST['nombre_pizza'] ) ){
            $errors['nombre_pizza'] = 'Debe seleccionar una opción';
        }
        if( empty( $_POST['tipo'] )){
            $errors['tipo'] = 'Debe seleccionar un tamaño';
        } 
        // Fin errores
        
        if( !isset( $errors ) ) {
            $_SESSION['nombre_pizza'] = $_POST['nombre_pizza'];
            $_SESSION['tipo'] = $_POST['tipo'];
            header( 'Location: form_ingredientes.php' );
            die();
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza</title>
</head>
<body>
    <main>
        <section>
            <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                <h1>PIZZA</h1>

                <select name="nombre_pizza" id="nombre_pizza">
                    <option value="" disabled selected>Seleccione una pizza</option>
                    <?php foreach( $_pizzas as $pizza ) : ?>
                        <option value="<?= $pizza->nombre_pizza ?>"><?= ucfirst( $pizza->nombre_pizza ) ?></option>
                    <?php endforeach; ?>
                </select>

                <?php if( isset( $errors['nombre_pizza'] ) ): ?>
                    <p><?= $errors['nombre_pizza'] ?></p>
                    <?php unset( $errors['nombre_pizza'] ) ?>
                <?php endif; ?>

                <input type="radio" name="tipo" id="mediana" value="mediana">
                <label for="mediana">Pequeña</label>
                <input type="radio" name="tipo" id="normal" value="normal">
                <label for="normal">Normal</label>
                <input type="radio" name="tipo" id="familiar" value="familiar">
                <label for="familiar">Familiar</label>

                <?php if( isset( $errors['tipo'] ) ): ?>
                    <p><?= $errors['tipo'] ?></p>
                    <?php unset( $errors['tipo'] ) ?>
                <?php endif; ?>

                <input type="submit" value="pizza">
            </form>
        </section>
    </main>
</body>
</html>
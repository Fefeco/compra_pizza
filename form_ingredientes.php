<?php
    
    session_start();

    if( !isset( $_SESSION['nombre_pizza'] ) && !isset( $_SESSION['tipo'] ) ){
        header( 'Location: form_pizza.php' );
        exit();
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
        if( !isset( $_POST['cantidad'] ) ){
            $errors['cantidad'] = 'Debe seleccionar la cantidad'; 
        }

        if( !isset( $errors ) || empty( $errors ) ) {
            $_SESSION['ingredientes'][$_POST['ingrediente_seleccionado']] = $_POST['cantidad'];
            unset( $_POST['ingrediente_seleccionado'] );
        }

        if( isset( $_SESSION['ingredientes'] ) ) {
            $tabla_ingredientes = $_SESSION['ingredientes'];
        }
    }

    include_once 'modelos/datos.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
</head>
<body>
    <main>
        <section>
            <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
                <h1>INGREDIENTES</h1>
                <h2>PIZZA pizza de <?= ucfirst( $_SESSION['nombre_pizza'] ) ?></h2>

                <select name="ingrediente_seleccionado" id="ingrediente_seleccionado">
                    <?php foreach( $_ingrediente as $ingrediente ) : ?>
                            <?php if( isset( $_POST['ingrediente_seleccionado'] ) && $_POST['ingrediente_seleccionado'] === $ingrediente->nombre ) : ?>
                                <option  ption value="<?=$ingrediente->nombre ?>" selected><?=ucfirst( $ingrediente->nombre ) ?></option>
                            <?php else: ?>
                                <option value="<?=$ingrediente->nombre ?>"><?=ucfirst( $ingrediente->nombre ) ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>

                <input type="radio" name="cantidad" value="simple" id="simple">
                <label for="simple">Simple</label>
                <input type="radio" name="cantidad" value="doble" id="doble">
                <label for="doble">Doble</label>
                
                <?php if( isset( $errors['cantidad'] ) ) : ?>
                    <p><?= $errors['cantidad'] ?></p>
                    <?php unset( $errors['cantidad'] ) ?>
                <?php endif; ?>

                <input type="submit" value="ingrediente">
            </form>
            <h2>INGREDIENTES SELECCIONADOS</h2>
            <?php if( isset( $tabla_ingredientes) ) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>INGREDIENTE</th>
                            <th>CANTIDAD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $tabla_ingredientes as $ingrediente => $cantidad ) : ?>
                            <tr>
                                <td><?= ucfirst( $ingrediente ) ?></td>
                                <td><?= $cantidad ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="includes/descartar.php">DESCARTAR</a>
                <a href="form_pago.php">PAGAR</a>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
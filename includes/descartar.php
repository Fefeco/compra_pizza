<?php
    session_start();
    session_destroy();
    header( 'Location: ../form_pizza.php' );
<?php 

    require 'funciones.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    //Conectar a la base de datos 

    $db = conectarDB();
    use Model\Propiedad;

    Propiedad::setDb($db);
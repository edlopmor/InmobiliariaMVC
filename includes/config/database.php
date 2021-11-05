<?php 

function conectarDB (){
    $db = mysqli_connect('localhost','root','','bienesraices');  
    //Nesario si en la base de datos tenemos ñ
    $db->set_charset('utf8');  
    /*Prueba de conexion */
    // if($db){
    //     echo ('Se ha conectado correctamente');

    // }else{
    //     echo ('No se ha conectado');
    // }
    if (!$db){
        echo "Error, no se pudo conectar";
        //Si se produce un error se cierra la aplicación , programación segura. 
        exit;
    }
    return $db;
}
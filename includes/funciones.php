<?php 
    define('TEMPLATES_URL',__DIR__. '/templates');
    define('FUNCIONES?URL',__DIR__. 'funciones.php');
    define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

    function incluirTemplate($nombre,$inicio=false){
        include  TEMPLATES_URL."/$nombre.php";
        
    }
    function estaAutenticado(){
        session_start();            
        if(!$_SESSION['login']) {
            header('Location: /');
        }   
}

    function debugear ($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;

    }
    //Funcion para sanear los datos que entran desde el html 
    function s($html): string{
        $s =htmlspecialchars($html);
        return $s;
    }
    function validarTipoContenido ($tipo){
        $tipos = ['vendedor','propiedad'];
        return in_array($tipo, $tipos);
    }
    function mostrarNotificacion($codigo){
        $mensaje = '';
        switch($codigo) {
            case 1:
                $mensaje = 'Creado correctamente';
                break;
            case 2:
                $mensaje = 'Actualizado correctamente';
                break;
            case 3:
                $mensaje = 'Eliminado correctamente';
                break;
            default: 
                $mensaje = false;
              
        }
        return $mensaje;
    }
    //Validamos si la id es validad en caso contrario la enviamos 
    function validarORedireccionar($url){

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) header("Location: ${url}");

        return $id;
    }
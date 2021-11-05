<?php 
namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PropiedadController{
    public static function index (Router $router){
        $propieades = Propiedad::getAll();
        $router->render('propiedades/admin',[
            'propiedades' => $propieades,
            'resultado' =>null
        ]);
    }
    public static function crear(){
        echo "Crear";
    }
    public static function actualizar(){
        echo "Actualizar propiedad";
    }
}


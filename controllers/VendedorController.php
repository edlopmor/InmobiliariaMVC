<?php 
namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedor;
        $errores = Vendedor::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Asigno los valores de la instancia al objeto
            $vendedor = new Vendedor(($_POST['vendedor']));
            //Comprobamos si hay errores
            $errores = $vendedor->validar();
            //Si no hay errores creamos el vendedor
            if (empty($errores)){
                $vendedor->crear();
            }
        }
        $router->render('vendedores/crear',[           
            'errores'=>$errores,
            'vendedor'=>$vendedor            
        ]);
    }
    public static function actualizar($id){
        echo "actualizar";
    }
    public static function eliminar(){
        echo "eliminar";
    }
}
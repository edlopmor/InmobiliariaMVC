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
    public static function actualizar(Router $router){
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');
        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::findXId($id);
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);
            
            $errores = $vendedor->validar();
            if (empty($errores)) $vendedor->actualizar($id);
        }
        $router -> render('/vendedores/actualizar',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }
    public static function eliminar(){
        
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            
            //Validad el id 
            $id = $_POST['id'];
            $id = filter_var($id,FILTER_VALIDATE_INT);
            if ($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::findXId($id);
                    $vendedor->eliminar();
                }
            }
            
            
        }
    }
}
<?php 
namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController{
    
    public static function index(Router $router){
        $propiedades = Propiedad::getCantidad(3);
        $inicio = true;
        $router-> render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio'=>$inicio,
            //TO DO
            'auth'=>false
        ]);
    }
    public static function nosotros(Router $router){
        $router-> render('paginas/nosotros',[
            'auth'=>false
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::getAll();
        $router-> render('paginas/propiedades',[
            'auth'=>false,
            'propiedades'=>$propiedades
        ]);
    }
    public static function propiedad(Router $router){
        $id = $_GET['id'] ?? null;
        //Validar que sea un id valido por id value .
        $id = validarORedireccionar($id);
        //Buscar la propiedad por ID 
        $propiedad = Propiedad::findXId($id);
        
        $router-> render('paginas/propiedad',[
            'auth'=>false,
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $router -> render('paginas/blog',[
            'auth'=> false
        ]);
    }
    public static function entradablog(Router $router){
        $router -> render('paginas/entradablog',[
            'auth'=> false
        ]);
    }
    public static function contacto(Router $router){
        $router -> render('paginas/contacto',[
            'auth'=> false

        ]);
    }
    
}
<?php 
namespace MVC;
class Router {
    public $rutasGET = [];
    public $rutasPOST = [];
   
    public function get ($url, $fn){
        $this-> rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this-> rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO']??'/';
        
        $metodo = $_SERVER['REQUEST_METHOD'];
        if ($metodo === 'GET') {
            //Si no existe le agregamos null.          
            $fn = $this->rutasGET[$urlActual] ?? null;              
        }else {
            
            $fn = $this->rutasPOST[$urlActual] ?? null; 
        }
        
        if ($fn){
            //La url existe y hay una funcion asociada. 
            call_user_func($fn,$this);
        }else {
             echo "Estoy aqui ";
        } 
        
        
    }
    //Muestra una vista 
    public function render($view, $datos = [] ) { 

        foreach($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); // Almacenamiento en memria durante un momento...

        include_once __DIR__ . "/views/$view.php";         
        $contenido = ob_get_clean(); //Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
    
}
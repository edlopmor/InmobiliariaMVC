<?php 
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index (Router $router){
        $propiedades = Propiedad::getAll();
        
        //Captura el mensaje que viene de la pantalla anterior de forma condicional.. 
        $resultado = $_GET['resultado'] ?? null;

        $contenido = "hola";
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }
    public static function crear (Router $router) {
        $propiedad = new Propiedad;
        $vededores = Vendedor::getAll();
        //Arreglo con mensaje de errores
        $errores = Propiedad::getErrores();

        //Ejecutar el codigo despues de que el usuario seleccione el boton de submit
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                //Crea una nueva instancia 
                $propiedad = new Propiedad($_POST['propiedad']);
                /*SUBIDA DE ARCHIVOS */
                $nombreImagen = md5(uniqid(rand())).".jpg";
                //Setear la imagen 
                //Realizar un resize a la imagen 
                
                if($_FILES["propiedad"]["tmp_name"]["imagen"]){
                    
                    
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    
                    $propiedad->setImagen($nombreImagen);                        
                    }                   
                    //Validamos 
                    $errores = $propiedad->validar();                    
                    //Revisamos que el array este vacio antes de enviarlo. 
                    if(empty($errores)){                        
                        //Crear la carpeta para subir imagenes 
                        if(!is_dir(CARPETA_IMAGENES)){
                            mkdir(CARPETA_IMAGENES);
                        }
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                        //Guarda en la base de datos 
                        $resultado= $propiedad->guardar();        
                    }     
            }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vededores,
            'errores'=>$errores
        ]);
                
    }
    public static function actualizar(){
        echo "Actualizar propiedad";
    }
}


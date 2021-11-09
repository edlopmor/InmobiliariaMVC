<?php 
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    
    public static function index(Router $router){
        $propiedades = Propiedad::getCantidad(3);
        $inicio = true;
        $router-> render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio'=>$inicio
            
        ]);
    }
    public static function nosotros(Router $router){
        $router-> render('paginas/nosotros',[
            
        ]);
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::getAll();
        $router-> render('paginas/propiedades',[
            
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
            
            'propiedad'=>$propiedad
        ]);
    }
    public static function blog(Router $router){
        $router -> render('paginas/blog',[
            
        ]);
    }
    public static function entradablog(Router $router){
        $router -> render('paginas/entradablog',[
            
        ]);
    }
    public static function contacto(Router $router){
        $mensaje= '';
        if ($_SERVER['REQUEST_METHOD']==='POST'){
            
            $respuestas = $_POST['contacto'];
            
            //Crear un nuevo objeto de phpMailer
            $mail = new PHPMailer();            
            /*
            MAIL_MAILER=smtp
            MAIL_HOST=smtp.mailtrap.io
            MAIL_PORT=2525
            MAIL_USERNAME=dfe69aedb966b2
            MAIL_PASSWORD=0eeffed6ca8a3b
            MAIL_ENCRYPTION=tls*/
            //Configura SMTP 
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'dfe69aedb966b2';
            $mail->Password = '0eeffed6ca8a3b';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del email 
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com','edlopmor@hotmail.es');
            $mail->Subject ='Tienes un nuevo mensaje';
            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';


            //Definir el contenido 
            $contenido = '<html>';
            $contenido .=' <p>Tienes un nuevo mensaje</> </html>';
            $contenido .=' <p>Nombre : '. $respuestas['nombre'] .' </p>';
            //Enviar de forma condicional el telefono o el email
            if ($respuestas['tipoContacto']==='telefono'){
                $contenido .='Eligio ser contactado por Teléfono';
                $contenido .=' <p>Telefono : '. $respuestas['telefono'] ?? null .' </p>';
                $contenido .=' <p>Fecha para realizar el contacto : '. $respuestas['fecha'] .' </p>';
                $contenido .=' <p>Hora para realizar el contacto : '. $respuestas['hora'] .' </p>';
            }else{
                $contenido .='Eligio ser contactado por email';
                $contenido .=' <p>Email : '. $respuestas['email'] .' </p>';
            }           
            $contenido .=' <p>Mensaje: '. $respuestas['mensaje'] .' </p>';
            $contenido .=' <p>Tipo : '. $respuestas['tipo'] .' </p>';            
            $contenido .=' <p>Presupuesto : '. $respuestas['presupuesto'] .'$ </p>';
            
            
            
            
            $contenido .='<html>';

            $mail->Body =$contenido;
            $mail->AltBody = "Body alternativo sin html";
            
            
            //Enviar mail 
            if($mail->send()){
                $mensaje= "Mensaje enviado correctamente";
            }else{
                $mensaje= "El mensaje no se pudo enviar";
            }

        }
        $router -> render('paginas/contacto',[
            
            'mensaje'=>$mensaje

        ]);
    }
    
}
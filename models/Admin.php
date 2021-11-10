<?php 
namespace Model;

class Admin extends ActiveRecord{
    public $id;
    public $email;
    public $password;
    //Datos de la base de datos. 
    protected static $tabla = 'usuarios';
    protected static $columnasDb = ['id','email','password'];

    public function __construct($args = []){
        $this->id = $args['id']?? '';
        $this->email = $args['email']?? '';
        $this->password = $args['password']?? '';
    }
    public function validar()
    {
        if(!$this->email) self::$errores [] = "Debes escribir el email";            
        if(!$this->password) self::$errores [] = "Debes escribir la password";

        return self::$errores;
    }
    public function existeUsuario(){
        //Revisar si un usario existe o no .
        $query = "SELECT * FROM ". self::$tabla . " WHERE email = '" .$this->email. "' LIMIT 1";   
        $resultado = self::$db->query($query);
        
        if(!$resultado->num_rows){
            self::$errores [] = 'El usuario no existe'; 
            return;          
        }else{
            return $resultado;
        }
        
        
    
    }
    public function comprobarPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usuario->password);
        if (!$autenticado){
            self::$errores [] = "El password es incorrecto";
        }
        return $autenticado;
    }
    public function autenticarUsuario(){
        session_start();

        //LLenar el array de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header ('Location: /admin');
    }

    
}
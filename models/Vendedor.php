<?php 
namespace App;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDb = ['id','nombre','apellido','telefono'];
    
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    
    public function __construct($args= [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono= $args['telefono'] ?? '';
        
    }
    public function validar(){
        if(!$this->nombre) self::$errores [] = "Debes añadir un nombre";   
        if(!$this->apellido) self::$errores [] = "Debes añadir unos apellidos";
        if(!$this->telefono) self::$errores[]= "Debes añadir un telefono";
        //Expresion regular 
        if(!preg_match('/[0-9]{9}/',$this->telefono)) self::$errores[]= "Formato de telefono no valido Ejemplo: 123456789";
        return self::$errores;
    }
}
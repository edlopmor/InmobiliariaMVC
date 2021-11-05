<?php 
    namespace Model;

    use Model\ActiveRecord;

class Propiedad extends ActiveRecord{
    
    protected static $tabla = 'propiedades';

    protected static $columnasDb = ['id','titulo','precio','imagen',
        'descripcion','nhabitaciones','nbaños','nplazasparking','creado','idvendedor'];
    
    public $id ;
    public $titulo ;
    public $precio ;
    public $imagen ;
    public $descripcion ;  
    public $nhabitaciones  ;
    public $nbaños ;
    public $nplazasparking ;
    public $creado ;
    public $idvendedor ; 

    public function __construct($args= [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->nhabitaciones = $args['nhabitaciones'] ?? '';
        $this->nbaños = $args['nbaños'] ?? '';
        $this->nplazasparking = $args['nplazasparking'] ?? '';
        $this->creado = date('Y/m/d');
        $this->idvendedor = $args['idvendedor'] ?? '';
    }

    public function validar()
    {
        if(!$this->titulo) self::$errores [] = "Debes añadir un titulo ";            
        if(!$this->precio) self::$errores [] = "Debes añadir un precio ";
        if(strlen($this->descripcion)<50 & strlen($this->descripcion)>250 ) self::$errores [] = "La descripción debe tener al menos 50 caracteres"; 
        if(!$this->nhabitaciones) self::$errores [] = "Debes añadir un numero de habitaciones";
        if(!$this->nbaños) self::$errores [] = "Debes añadir un numero de baños";   
        if(!$this->nplazasparking) self::$errores [] = "Debes añadir un numero de plazas de parking";
        if(!$this->idvendedor) self::$errores[]= "Seleccione un vendedor";
         //Validacion imagen por nombre y por el atributo error. Imagen superior a 2mbs.
        if(!$this->imagen) self::$errores[]= "La imagen de la propiedad es obligatoria"; 

        return self::$errores;
        
    }
   

}
<?php 
    //Es case sensitive.
    namespace Model;

class ActiveRecord {    
    //Base de datos 
    protected static $db;
    //Nos permite identificar la forma que tendra el objeto desde la base de datos. 
    protected static $columnasDb = [];
    protected static $tabla = 'ActiveRecord';
    
    //Gestion de errores 
    protected static $errores =[];

    //Definir conexion a base de datos. 
    public static function setDb($dataBase){
        self::$db = $dataBase;
    }
    //Guardar en la base de datos. Si el id existe actualiza el registro, si no existe lo crea. 
    public function guardar(){
        if(!is_null($this->id)){
            //Actualizar 
            $this->actualizar();
        }else{
            //Crear
            $this->crear();
        }
    }
    public function crear(){
        //Sanear los datos 
        $atributos = $this->sanearDatos();

        $query = "INSERT INTO ". static::$tabla . "( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES(' " ;
        $query .= join("', '",array_values($atributos));
        $query .= " ')";
                                  
        $resultado = self::$db->query($query);
        if($resultado) header("location: /admin? resultado=1");
        
                    
    }
    public function actualizar(){
        //Siempre que interaccionemos con la base de datos debemos sanear los datos, para evitar injecciones sql. 
        $atributos = $this->sanearDatos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores []= "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ',$valores);
        $query .= " WHERE ID = '". self::$db->escape_string($this->id) ."'" ;
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        if($resultado) header("location: /admin? resultado=2");
        
    }
    //Eliminar 
    public function eliminar(){           
        $query = "DELETE FROM ". static::$tabla ." WHERE ID= " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if($resultado){
            header("location: /admin? resultado=3");
            $this->borrarImagen();
        }

    
    }
    //Lista todas las propiedades.
    public static function getAll(){
       
        $query = "SELECT * FROM " .static::$tabla ;

        $resultado = self::consultarSql($query);
        return $resultado;            
    }
    //Busca una propiedad por us id. 
    public static function findXId($id){
        $query = " SELECT * FROM ". static::$tabla ." WHERE id=${id}";
        $resultado = self::consultarSql($query);
        //Funcion de php para devolver la primera posicion de un array. 
        return array_shift($resultado);
    }
    public static function consultarSql($query){
        //Consultar la base de datos 
        $resultado = self::$db->query($query);
        
        //Iterar los resultados             
        $array = [];
        
        while($registro = $resultado->fetch_assoc() ){
            $array [] = static::crearObjeto($registro);                               
        }                  
        //Liberar la memoria 
        $resultado->free();
        return $array;
    }
    protected static function crearObjeto ($registro){
        $objeto = new static;
        
        foreach ($registro as $key => $value) {
            if(property_exists($objeto,$key)){
                $objeto->$key = $value;                }
        
            }
             return $objeto;
           
    }
    //Identifica y une los atributos de la base de datos. 
    
    public function atributos (){
        $atributos = [];
        foreach(static::$columnasDb as $columna){
            //Ignorar la columna de id, es una columna autoincremental que se genera en Base de datos. 
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    //Subida de archivos 
    public function setImagen ($imagen){
        //Eliminar la imagen previa 
        if (!is_null($this->id)){
            $this->borrarImagen();
        }
        //Asignar al atributo el nombre de la imagen. 
        if ($imagen){
            $this->imagen = $imagen;
        }

    }
    //Eliminar imagen 
    public function borrarImagen (){
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            
        if($existeArchivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    public function sanearDatos (){
        $atributos = $this->atributos();    
        $saneado = [];
        //Recorremos los atributos y los metemos en el nuevo arreglo.

        foreach($atributos as $key => $value){
            $saneado [$key] = self::$db->escape_string($value);
        }
        return $saneado;

    }
    //Validando si hay errores. 
    public static function getErrores(){
        
        return static::$errores;
    }
    //Sincroniza el objeto en memoria con los cambios realizados por el usuario.
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this,$key )&& !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function validar(){
        static::$errores= [];
        return static::$errores;
        }

    //Obtiene un numero determinado de registros. 
    public static function getCantidad($cantidad){
        
        $query = "SELECT * FROM " .static::$tabla ." LIMIT " . $cantidad ;

        $resultado = self::consultarSql($query);
        return $resultado;           
    }


    
}
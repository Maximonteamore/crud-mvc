<?php
class Modelo { //es generico puedo utilizarlo para cualquier tabla de la base de datos mvc.
    
    
    private $db;
    private $datos;
    
    //metodo constructor.
    public function __construct(){
        $this->datos = [];
    }

    //funcion para conectar a la base de datos.
    public function conectar() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage(); // Retorno el error para manejarlo en el controlador.
        }
    }

    //funcion para insertar datos a la tabla
    public function insertar($tabla,$data){
        if (!$this->db) return false;
        $consulta = "insert into ".$tabla." values(null,".$data.")";
        $resultado=$this->db->query($consulta);
        return $resultado ? true : false;
    }

    //funcion para mostrar datos de la tabla
    public function mostrar($tabla,$condicion){
        if (!$this->db) return []; // no hacer nada si no hay conexión
        $consul="select * from ".$tabla." where ".$condicion.";";
        
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[]=$filas;
        }
        return $this->datos;
    }

    //funcion para actualizar la tabla
    function actualizar($tabla,$data,$condicion){
        if (!$this->db) return false;
        $consulta="update ".$tabla." set ".$data." where ".$condicion;
        $resultado=$this->db->query($consulta);
        return $resultado ? true : false;
    }

    //funcion para eliminar registro de una tabla
    function eliminar($tabla,$condicion){
        if (!$this->db) return false;
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        return $res ? true : false;
    }
} 
<?php
class Modelo { //es generico puedo utilizarlo para cualquier tabla de la base de datos mvc
    
    private $Modelo;
    private $db;
    private $datos;
    
    //metodo constructor
    public function __construct(){
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=mvc',"root","");
    }

    //funcion para insertar datos a la tabla
    public function insertar($tabla,$data){
        $consulta = "insert into ".$tabla." values(null,".$data.")";
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //funcion para mostrar datos de la tabla
    public function mostrar($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[]=$filas;
        }
        return $this->datos;
    }

    //funcion para actualizar la tabla
    function actualizar($tabla,$data,$condicion){
        $consulta="update ".$tabla." set ".$data." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }

    //funcion para eliminar registro de una tabla
    function eliminar($tabla,$condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if($res){
            return true;
        }else{
            return false;
        }
    }
} 
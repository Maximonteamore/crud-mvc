<?php
//La clase modelo tiene la conexion a la base de datos y tiene metodos para insertar,mostrar,actualizar y eliminar datos en una base de datos.
class Modelo{ //es generico puedo utilizarlo para cualquier tabla de la base de datos mvc se le pasa el nombr de la tabla y la consulta a los metodos.
    
    private $db;
    private $datos;
    
    
    //Funcion que conecta a la BD si no se puede conectar retrona el mensaje de error.
    public function conectar() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');//conexion a la bd utilizando pdo.
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Esta línea configura el modo de manejo de errores del objeto PDO, al usar PDO::ERRMODE_EXCEPTION, cualquier error de base de datos lanzará una excepción (PDOException).
            return true; // conexión exitosa
        } catch (PDOException $e) {
            // Puedes loguear o mostrar el error si es necesario
            // echo "Error de conexión: " . $e->getMessage();
            return $e->getMessage(); // fallo en la conexión
        }
    }

    public function desconectar() {
        $this->db = null;
    }
    

    //funcion para insertar datos a la tabla, recibe dos parametors la tabla a la cual quiera insertar y los datos se insertan,devuelve true si pudo insertar y falso si no pudo insertar los datos.
    public function insertar($tabla,$data){
        $consulta = "insert into ".$tabla." values(null,".$data.")";//armo la consulta sql con los parametros recibidos
        $resultado=$this->db->query($consulta);//guardo en resultado el valor que me arroja query que es un true o false,utilizo el atributo db que tiene la conexion y uso query para mandar la consulta.

        //controlo si fue exitoso o no la insercion.
        return $resultado ? true : false;
        
    }

    //funcion para mostrar datos de la tabla que recibe como parametros y la condicion.
    public function mostrar($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consul);//cambiar por fetch
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) { //obtengo todas las filas de ese conjunto de resultados.
            $this->datos[]=$filas;// guardo en un arreglo los datos del arreglo asociativo recibido en $resu
        }
        return $this->datos;
    }

    //funcion para actualizar la tabla recibe 3 parametros la tabla,los datos a actualizar y la condicion retorna un boolean.
    function actualizar($tabla,$data,$condicion){
        $consulta="update ".$tabla." set ".$data." where ".$condicion;
        $resultado=$this->db->query($consulta);
        return $resultado ? true : false;
    }

    //funcion para eliminar registro de una tabla recibe dos parametros la tabla y la condicion retorna un boolean.
    function eliminar($tabla,$condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $resultado=$this->db->query($eli);
        return $resultado ? true : false;
    }
}
<?php
require_once("modelo/index.php");//traigo el modelo la conexion a la base de datos y sus funciones.

class modeloController{
    private $model;
    public function __construct(){
        $this->model= new Modelo();//hago la conecxion  a la bd que esta en Modelo creo una instancia y la reutilizo aca
    }
    //muestro registro,index es inicio aca llamo a modelo que es quien maneja todo en la base de datos aca lo llamo con parametros
        static function indexsd(){
                $producto = new Modelo();//creo una instancia de Modelo y uso sus metodos.
                $dato = $producto->mostrar("productos","1=1");//guardo en dato lo que me trae la funcion mostrar,"1=1"condicion valida "universal"
                require_once("vista/index.php");//muestro la vista

            }

            static function index() {
                $producto = new Modelo();
                $conexion = $producto->conectar();
            
                if ($conexion === true) {
                    $dato = $producto->mostrar("productos", "1=1");
                    $mensaje_db = null;
                } else {
                    // Falló la conexión
                    $dato = []; // No hay datos
                    $mensaje_db = $conexion; // Guardamos el mensaje de error para mostrarlo en la vista
                }
            
                require_once("vista/index.php");
            }

            //retorno la visa.
        static function nuevo(){
            require_once("vista/nuevo.php");//muestro la vista

        }

        static function guardar(){
        $nombre = trim($_REQUEST['nombre']);
        $precio = $_REQUEST['precio'];

        // Validaciones básicas
        if (empty($nombre) || !is_numeric($precio)) {
            header("location:".urlsite."?m=nuevo&mensaje=error_datos");
            return;
        }

        $data = "'".$nombre."',".$precio;
        $producto = new Modelo();
        $resultado = $producto->insertar("productos", $data);

        if ($resultado) {
            header("location:".urlsite."?m=index&mensaje=ok_guardar");
        } else {
            header("location:".urlsite."?m=nuevo&mensaje=error_guardar");
        }
    }

    //editar
    static function editar(){
        $id = $_REQUEST['id'];
        $producto = new Modelo();
        $dato = $producto->mostrar("productos","id=".$id);
        if (!empty($dato)) {
            require_once("vista/editar.php");
        } else {
            echo "No se encontró el producto.";
        }

    }

    //actualiza
    static function actualizar(){
    $id = $_REQUEST['id'];
    $nombre = trim($_REQUEST['nombre']);
    $precio = $_REQUEST['precio'];

    if (empty($id) || empty($nombre) || !is_numeric($precio)) {
        header("location:".urlsite."?m=editar&id=".$id."&mensaje=error_datos");
        return;
    }

    $data = "nombre='".$nombre."',precio=".$precio;
    $producto = new Modelo();
    $resultado = $producto->actualizar("productos", $data, "id=".$id);

    if ($resultado) {
        header("location:".urlsite."?m=index&mensaje=ok_actualizar");
    } else {
        header("location:".urlsite."?m=editar&id=".$id."&mensaje=error_actualizar");
    }
}


    //eliminar
    static function eliminar(){
    if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
        // ID inválido
        header("location:".urlsite."?m=index&mensaje=error_id_invalido");
        return;
    }

    $id = (int) $_REQUEST['id'];
    $producto = new Modelo();
    $resultado = $producto->eliminar("productos", "id=".$id);

    if ($resultado) {
        header("location:".urlsite."?m=index&mensaje=ok_eliminar");
    } else {
        header("location:".urlsite."?m=index&mensaje=error_eliminar");
    }
}



}
<?php
require_once("modelo/index.php");//traigo el modelo la conexion a la base de datos y sus funciones.

class modeloController{
    private $model;
    public function __construct(){
        $this->model= new Modelo();//hago la conecxion  a la bd que esta en Modelo creo una instancia y la reutilizo aca
    }
    //muestro registro,index es inicio aca llamo a modelo que es quien maneja todo en la base de datos aca lo llamo con parametros
        static function index(){
                $producto = new Modelo();//creo una instancia de Modelo y uso sus metodos.
                $dato = $producto->mostrar("productos","1");//guardo en dato lo que me trae la funcion mostrar
                require_once("vista/index.php");//muestro la vista

            }
            //retorno la visa.
        static function nuevo(){
            require_once("vista/nuevo.php");//muestro la vista

        }

    static function guardar(){
       $nombre = $_REQUEST['nombre'];//recupero la informacion del formulario
       $precio = $_REQUEST['precio'];
       $data = "'".$nombre."',".$precio;
       $producto = new Modelo();
       $dato = $producto->insertar("productos",$data);//llamo la funcion insertar le paso paramatreos.
       header("location:".urlsite);//redireciono a la pagina principal.

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
       $nombre = $_REQUEST['nombre'];
       $precio = $_REQUEST['precio'];
       $data = "nombre='".$nombre."',precio=".$precio;
       $producto = new Modelo();
       $dato = $producto->actualizar("productos",$data,"id=".$id);
       header("location:".urlsite);

    }

    //eliminar
    static function eliminar(){
        $id = $_REQUEST['id'];
        $producto = new Modelo();
        $dato = $producto->eliminar("productos","id=".$id);
        header("location:".urlsite);

    }


}
<?php
require_once("modelo/index.php");//traigo el modelo y la conexion a la base de datos y sus funciones.

    class modeloController{

        private $model;

        public function __construct(){
            $this->model= new Modelo();
        }
                //funcion que muestra los datos de la BD y carga en pagina principal,si no hay datos lo carga vacio.
                static function index() {

                    $producto = new Modelo();//creo una instancia de Modelo y uso sus metodos.
                    $conexion = $producto->conectar();//conecto a la BD.
                
                    //control de conexion a la BD.
                    if ($conexion === true) {
                        $dato = $producto->mostrar("productos", "1=1");//guardo en dato lo que me trae la funcion mostrar,"1=1"condicion valida "universal"
                        $mensaje_db = null;

                    } else {
                        //Falló la conexión.
                        $dato = []; //No hay datos.
                        $mensaje_db = $conexion; //Guarda el mensaje de error para mostrarlo en la vista.
                    }
                    
                    require_once("vista/index.php");//muestro la vista.
                }

                //
            static function nuevo(){

                $producto = new Modelo();
                $conexion = $producto->conectar();
                
                //control de conexion a la BD.
                if ($conexion !== true) {
                    $mensaje_db = $conexion; //Guardo el error de conexión.
                    
                } else {
                    $mensaje_db = null;
                    
                }
                require_once("vista/nuevo.php");//muestro la vista

            }

            //funcion que guarda los datos recibidos en los parametros,control de conexion y de insercion.
            static function guardar(){

                $producto = new Modelo();
                $conexion = $producto->conectar();
            
                //control de conexion a la BD.
                if ($conexion !== true) {
                    //Si la conexión falló, redirigimos con mensaje de error.
                    header("location:".urlsite."?m=nuevo&mensaje=error_conexion");
                    return;
                }

                //caputaro las variables.
                $nombre = trim($_REQUEST['nombre']);
                $precio = $_REQUEST['precio'];
                $stock = $_REQUEST['stock'];

            //Validaciones de datos, vacios o no numerico.
            if (empty($nombre) || !is_numeric($precio) || !is_numeric($stock) ) {
                header("location:".urlsite."?m=nuevo&mensaje=error_datos");
                return;
            }

            //armo consulta y envio.
            $data = "'".$nombre."',".$precio.",".$stock;

            $resultado = $producto->insertar("productos", $data);

            //controlo si fue exitoso la insercion.
            $resultado ? header("location:".urlsite."?m=index&mensaje=ok_guardar") : header("location:".urlsite."?m=nuevo&mensaje=error_guardar");
            
        }

    //funcion para editar recibe un id como parametro y busca en la BD.
        static function editar(){

            $producto = new Modelo();
            $conexion = $producto->conectar();
        
            if ($conexion !== true) {
                //Si la conexion fallo, redirigimos con mensaje de error.
                header("location:".urlsite."?m=nuevo&mensaje=error_conexion");
                return;
            }

            $id = $_REQUEST['id'];
            
            
            $dato = $producto->mostrar("productos","id=".$id);
            if (!empty($dato)) {
                require_once("vista/editar.php");
            } else {
                echo "No se encontró el producto.";
            }

        }

        //funcion que actualiza los datos que llegan por parametros de la vista,control de conexion y de actualizacion.
        static function actualizar(){

            $producto = new Modelo();
            $conexion = $producto->conectar();
        
            if ($conexion !== true) {
                //Si la conexion fallo, redirigimos con mensaje de error.
                header("location:".urlsite."?m=nuevo&mensaje=error_conexion");
                return;
            }

        $id = $_REQUEST['id'];
        $nombre = trim($_REQUEST['nombre']);
        $precio = $_REQUEST['precio'];
        $stock = $_REQUEST['stock'];

        if (empty($id) || empty($nombre) || !is_numeric($precio) || !is_numeric($stock)) {
            header("location:".urlsite."?m=editar&id=".$id."&mensaje=error_datos");
            return;
        }

        $data = "nombre='".$nombre."', precio=".$precio.", stock=".$stock;

        $resultado = $producto->actualizar("productos", $data, "id=".$id);

        $resultado ? header("location:".urlsite."?m=index&mensaje=ok_actualizar") : header("location:".urlsite."?m=editar&id=".$id."&mensaje=error_actualizar");
        
    }


        //funcion eliminar recibe un id como parametro,control de conexion y de eliminacion.
        static function eliminar(){

            $producto = new Modelo();
            $conexion = $producto->conectar();
        
            if ($conexion !== true) {
                //Si la conexion fallo, redirigimos con mensaje de error.
                header("location:".urlsite."?m=nuevo&mensaje=error_conexion");
                return;
            }

        if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
            //ID invalido
            header("location:".urlsite."?m=index&mensaje=error_id_invalido");
            return;
        }

        $id = (int) $_REQUEST['id'];
    
        $resultado = $producto->eliminar("productos", "id=".$id);

        $resultado ? header("location:".urlsite."?m=index&mensaje=ok_eliminar") :header("location:".urlsite."?m=index&mensaje=error_eliminar");

    }



    }
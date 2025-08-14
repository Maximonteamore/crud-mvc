<?php
//Este es el archivo principal de la aplicación MVC.

require_once("config.php");  //Incluye la configuracion.
require_once("controlador/index.php"); //Incluye el controlador

// Revisa si el parámetro 'm' está presente en la URL pueden ser {nuevo,editar,eliminar}.
if (isset($_GET['m'])) {
    // Verifica si el método existe en el controlador 'modeloController'.
    if (method_exists("modeloController", $_GET['m'])) {
        modeloController::{$_GET['m']}(); //Llama al método que se invoca segun lo que venga en la variable m.
    } else {
        echo "Método no encontrado"; // Si no existe el método.
    }
} else {
    // Si no se pasa el parametro 'm', llama al método index del controlador.
    modeloController::index();  // Por defecto, muestra el listado de productos.
}
?>

<?php
// Este es el archivo principal de la aplicación MVC

require_once("config.php");  // Incluye la configuración
require_once("controlador/index.php"); // Incluye el controlador

// Revisa si el parámetro 'm' está presente en la URL
if (isset($_GET['m'])) {
    // Verifica si el método existe en el controlador 'modeloController'
    if (method_exists("modeloController", $_GET['m'])) {
        modeloController::{$_GET['m']}(); // Llama al método
    } else {
        echo "Método no encontrado"; // Si no existe el método
    }
} else {
    // Si no se pasa 'm', llama al método index del controlador
    modeloController::index();  // Por defecto, muestra el listado de productos
}
?>

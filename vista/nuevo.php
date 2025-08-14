<?php 
require_once("layouts/header.php");
?>

<?php if (empty($mensaje_db)): ?>
    <h1 class="tex.center">NUEVO</h1>
    <form action="" method="get"><!--creo un formulario con method get -->
    <input type="text" placeholder="INGRESE NOMBRE:" name="nombre"> <br>
    <input type="text" placeholder="INGRESE PRECIO:" name="precio"> <br>
    <input type="text" placeholder="INGRESE STOCK:" name="stock"> <br>
    <input type="submit" class="btn" name="btn" value="GUARDAR"> <br><!--envio el fomulario -->
    <input type="hidden" name="m" value="guardar"><!--lo utilizo para enviar el metodo guardar del index de controlador -->
</form>    

<?php endif; ?>



<?php
require_once("layouts/footer.php");
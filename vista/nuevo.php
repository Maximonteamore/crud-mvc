<?php 
require_once("layouts/header.php");
?>
<h1 class="tex.center">NUEVO</h1>
    <form action="" method="get">
    <input type="text" placeholder="INGRESE NOMBRE:" name="nombre"> <br>
    <input type="text" placeholder="INGRESE PRECIO:" name="precio"> <br>
    <input type="submit" class="btn" name="btn" value="GUARDAR"> <br>
    <input type="hidden" name="m" value="guardar">
</form>
<form action="" method="get">
<br>
<input type="submit" class="btn" name="btn" value="VOLVER">  
<input type="hidden" name="m" value="index">
</form>
<?php
require_once("layouts/footer.php");
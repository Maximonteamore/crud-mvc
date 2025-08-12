<?php 
require_once("layouts/header.php");
?>
<h1 class="tex.center">EDITAR</h1>
    <form action="" method="get">
     <?php
 if (!empty($dato)) { // Verificamos que $dato no esté vacío
    foreach($dato as $key => $value):
     foreach($value as $v): 
     ?>
    <input type="text" value="<?php echo $v['nombre'] ?>" name="nombre"> <br>
    <input type="text" value="<?php echo $v['precio'] ?>" name="precio"> <br>
    <input type="hidden" value="<?php echo $v['id'] ?>" name="id"> <br>
    <input type="submit" class="btn" name="btn" value="ACTUALIZAR"> <br>
    <input type="hidden" name="m" value="actualizar">
    
    
    <?php
        endforeach;
    endforeach;
} else {
    echo "Producto no encontrado.";
}
         ?>
</form>
<form action="" method="get">
<br>
<input type="submit" class="btn" name="btn" value="VOLVER">  
<input type="hidden" name="m" value="index">
</form>
<?php
require_once("layouts/footer.php");
?>
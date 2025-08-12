<?php 
require_once("layouts/header.php");
?>

<!-- ✅ BLOQUE DE MENSAJES -->
<?php if (isset($_GET['mensaje'])): ?>
    <?php
        $mensajes = [
            'error_datos' => '⚠️ Datos inválidos. Revisá el nombre y el precio.',
            'error_actualizar' => '❌ Error al actualizar el producto.',
            'error_id_invalido' => '⚠️ ID inválido. No se encontró el producto.'
        ];
        $tipo = strpos($_GET['mensaje'], 'ok_') === 0 ? 'success' : 'error';
    ?>
    <p class="alert-<?= $tipo ?>">
        <?= $mensajes[$_GET['mensaje']] ?? '' ?>
    </p>
    <?php endif; ?>

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
<?php //llamo a los archivos php que contienen el html de la pagina,en <a> envio la variable m.
require_once("layouts/header.php");//traigo cabezera de la pagina.
?>

<!-- ✅ BLOQUE DE MENSAJES -->
<?php if (isset($_GET['mensaje'])): ?>
    <?php
        $mensajes = [
            'ok_guardar' => '✅ Producto guardado correctamente.',
            'error_guardar' => '❌ Error al guardar el producto.',
            'error_datos' => '⚠️ Datos inválidos. Revisá el nombre y el precio.',
            'ok_actualizar' => '✅ Producto actualizado correctamente.',
            'error_actualizar' => '❌ Error al actualizar el producto.',
            'ok_eliminar' => '✅ Producto eliminado correctamente.',
            'error_eliminar' => '❌ Error al eliminar el producto.',
            'error_id_invalido' => '⚠️ ID inválido. No se pudo eliminar el producto.'
        ];
        $tipo = strpos($_GET['mensaje'], 'ok_') === 0 ? 'success' : 'error';
    ?>
    <p class="alert-<?= $tipo ?>">
        <?= $mensajes[$_GET['mensaje']] ?? '' ?>
    </p>
    <?php endif; ?>

    <?php if (!empty($mensaje_db)): ?>
    <p style="color: red; font-weight: bold;">
        ❌ Error de conexión con la base de datos:<br>
        <small><?= $mensaje_db ?></small>
    </p>
<?php endif; ?>

<!--<a href="index.php?m=nuevo" class="btn">NUEVO</a> --enlace al archivo principal index le envia una variable con el valor "nuevo" -->

<?php if (empty($mensaje_db)): ?>
    <a href="index.php?m=nuevo" class="btn">NUEVO</a>
<?php else: ?>
    <a class="btn disabled" title="Deshabilitado por error de conexión">NUEVO</a>
<?php endif; ?>


<!--creo una tabla -->
<table>
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>Precio</td>
        <td>ACCION</td>
    </tr>
    <tbody>
        <?php //controlo si la variable dato que viene del index controler no esta vacia,si es correcto recorro dato con foreach para obtener los datos e imprimirlos en los td con echo.
            if(!empty($dato)):
                foreach($dato as $key => $value)
                    foreach($value as $v):?>
                    <tr>
                        <td><?php echo $v['id'] ?> </td>
                        <td><?php echo $v['nombre'] ?> </td>
                        <td><?php echo $v['precio'] ?> </td>
                        <td><!--botones que apuntan a index.php principal, enviando valores para luego ser controladas -->
                        <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a> 
                        <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTAS SEGURO DE ELIMINAR'); false">ELIMINAR</a>
                     </td>
                    </tr>
                
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">NO HAY REGISTRO</td>
            </tr> 
            <?php endif; ?>
    </tbody>
</table>

<?php

require_once("layouts/footer.php");//traigo el cierre de lapagina.
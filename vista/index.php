<?php //llamo a los archivos php que contienen el html de la pagina,en <a> envio la variable m con valor nuevo.
require_once("layouts/header.php");//traigo cabezera de la pagina.
?>



<!--<a href="index.php?m=nuevo" class="btn">NUEVO</a> --enlace al archivo principal index le envia una variable con el valor "nuevo" -->
<!--controlo si no se puede conectar a la BD desabilito el boton nuevo con css calase btn  -->
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
        <td>Accion</td>
    </tr>
    <tbody>
        <?php //controlo si la variable dato no esta vacia que viene del controlador,si es correcto recorro dato con foreach para obtener los datos e imprimirlos en los td con echo.
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
            <?php endif ?>
    </tbody>
</table>

<?php

require_once("layouts/footer.php");//traigo el cierre de lapagina.
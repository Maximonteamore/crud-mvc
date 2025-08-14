<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Productos</title>
    <link rel="stylesheet" href="vista/css/app.css?v=1">
</head>
<body>
    <div class="panel">
        <h1 class="text-center">SISTEMA DE PRODUCTOS</h1>
        <!-- contenido-->
         
 <!--  controlo errores -->
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
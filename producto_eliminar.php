<?php

include ("conexion_bd.php");
$conexion = conectar_bd();

$id_producto = $_GET['id_producto'];
$sql="DELETE FROM producto WHERE `producto`.`id_producto` = $id_producto";

$result = mysqli_query($conexion, $sql);

    header('Location: producto_inicio.php');
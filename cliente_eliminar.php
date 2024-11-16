<?php

include ("conexion_bd.php");
$conexion = conectar_bd();

$id_cliente = $_GET['id_cliente'];
$sql="DELETE FROM cliente WHERE id_cliente = $id_cliente ";

$result = mysqli_query($conexion, $sql);

    header('Location: cliente_inicio.php');
<?php
include("../../conexion_bd.php");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
$mysqli = conectar_db_poo();

$sql = "SELECT * FROM `producto` ORDER BY cantidad_vendida DESC LIMIT 10";
$result = $mysqli->query($sql);
$data = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $row["url_imagen"] = "http://" . $_SERVER['HTTP_HOST'] . "/sistema/imagenes/" . $row['imagen_producto'];
    $data[] = $row;
  }
}

echo json_encode($data);

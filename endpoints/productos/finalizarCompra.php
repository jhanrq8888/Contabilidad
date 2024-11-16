<?php
include("../../conexion_bd.php");
header("Access-Control-Allow-Headers: *");
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
$mysqli = conectar_db_poo();

$request = json_decode(file_get_contents("php://input"), true);

$productos = $request["productos"];
$sql = "UPDATE producto SET cantidad_vendida= cantidad_vendida + ?, cantidad_producto = cantidad_producto - ? WHERE id_producto = ?";
$stmt = $mysqli->prepare($sql);

foreach ($productos as $item) {
  $cantidad = $item["cantidad"];
  $idProducto = $item["id_producto"];
  $stmt->bind_param("sss", $cantidad, $cantidad, $idProducto);
  $stmt->execute();
}
$data = [
  "message" => "exito",
];
echo json_encode($data);

<?php
include("conexion_bd.php");
$conexion = conectar_bd();

// Recuperar los datos del formulario
$id_producto = $_POST['id_producto'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$estado = $_POST['estado'];
$imagen = $_POST['imagen'];

// Validar los datos si es necesario

// Construir la consulta SQL para actualizar los datos
$sql = "UPDATE `producto` SET `descripcion_producto` = '$descripcion', `precio_producto` = '$precio', `cantidad_producto` = '$cantidad', `imagen_producto` = '$imagen', `modelo_producto` = '$modelo', `estado_producto` = '$estado' WHERE `producto`.`id_producto` = $id_producto";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    // Redireccionar a la página principal si la actualización fue exitosa
    header("Location: producto_inicio.php"); // Cambia 'index.php' por la página principal que desees
} else {
    // Manejo de errores
    echo "Error actualizando registro: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>

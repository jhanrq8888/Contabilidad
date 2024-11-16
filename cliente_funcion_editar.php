<?php
include("conexion_bd.php");
$conexion = conectar_bd();

// Recuperar los datos del formulario
$id_cliente = $_POST['id_cliente'];
$nombre = $_POST['nombre'];
$appPaterno = $_POST['appPaterno'];
$appMaterno = $_POST['appMaterno'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$genero = $_POST['genero'];

// Validar los datos si es necesario

// Construir la consulta SQL para actualizar los datos
$sql = "UPDATE `cliente` SET
    `nombre_cliente` = '$nombre',
    `apellido_paterno_cliente` = '$appPaterno',
    `apellido_materno_cliente` = '$appMaterno',
    `direccion_cliente` = '$direccion',
    `email_cliente` = '$correo',
    `telefono_cliente` = '$telefono',
    `genero_cliente` = '$genero'
    WHERE `id_cliente` = $id_cliente";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
    // Redireccionar a la página principal si la actualización fue exitosa
    header("Location: cliente_inicio.php"); // Cambia 'index.php' por la página principal que desees
} else {
    // Manejo de errores
    echo "Error actualizando registro: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>

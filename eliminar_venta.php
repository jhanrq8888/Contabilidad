<?php
include("conexion_bd.php");  // Asegúrate de tener este archivo para la conexión
$conexion = conectar_bd();

// Obtener el ID de la venta
$id_venta = isset($_GET['id_venta']) ? $_GET['id_venta'] : 0;

if ($id_venta == 0) {
    echo "No se ha proporcionado un ID de venta válido.";
    exit;
}

// Eliminar los detalles de la venta (los registros dependientes)
$sql_detalles = "DELETE FROM detalles_venta WHERE venta_id = $id_venta";
if (!mysqli_query($conexion, $sql_detalles)) {
    echo "Error al eliminar los detalles de la venta: " . mysqli_error($conexion);
    exit;
}

// Eliminar la venta
$sql_venta = "DELETE FROM ventas WHERE id_venta = $id_venta";
if (mysqli_query($conexion, $sql_venta)) {
    echo "Venta eliminada correctamente.";
    header('Location: venta_registro.php'); // Redirigir a la lista de ventas después de eliminar
} else {
    echo "Error al eliminar la venta: " . mysqli_error($conexion);
}
?>

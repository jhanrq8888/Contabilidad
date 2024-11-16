<?php
include("conexion_bd.php");  // Asegúrate de tener este archivo para la conexión
$conexion = conectar_bd();

// Verificar si se pasó el id_venta en la URL
if (isset($_GET['id_venta'])) {
    $id_venta = $_GET['id_venta'];

    // Obtener los datos de la venta seleccionada
    $sql = "SELECT v.id_venta, v.fecha, v.cta_bi, v.cta_igv, v.cta_total, c.nombre_cliente, c.apellido_paterno_cliente, c.apellido_materno_cliente 
            FROM ventas v 
            INNER JOIN cliente c ON v.cliente_id = c.id_cliente
            WHERE v.id_venta = $id_venta";
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se encontró la venta
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $venta = mysqli_fetch_assoc($resultado);

        // Formatear los valores numéricos
        $cta_bi = number_format($venta['cta_bi'], 2);
        $cta_igv = number_format($venta['cta_igv'], 2);
        $cta_total = number_format($venta['cta_total'], 2);
        $fecha_venta = date('d/m/Y', strtotime($venta['fecha']));
    } else {
        echo "<p>Venta no encontrada.</p>";
        exit();
    }
} else {
    echo "<p>No se ha especificado una venta.</p>";
    exit();
}

// Actualizar los datos si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['fecha'];
    $cta_bi = $_POST['cta_bi'];

    // Realizar el cálculo del IGV y el total
    $cta_igv = $cta_bi * 0.18;  // Supongo que el IGV es el 18%
    $cta_total = $cta_bi + $cta_igv;

    // Realizar la actualización en la base de datos
    $sql_update = "UPDATE ventas 
                   SET fecha = '$fecha', cta_bi = '$cta_bi', cta_igv = '$cta_igv', cta_total = '$cta_total'
                   WHERE id_venta = $id_venta";
    $resultado_update = mysqli_query($conexion, $sql_update);

    if ($resultado_update) {
        echo "<p>Venta actualizada correctamente.</p>";
        header("Location: index.php"); // Redirigir después de la actualización
        exit();
    } else {
        echo "<p>Error al actualizar la venta.</p>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function calcularValores() {
            // Obtener el valor de la base imponible
            var cta_bi = parseFloat(document.getElementById('cta_bi').value) || 0;

            // Calcular IGV y total
            var cta_igv = cta_bi * 0.18;  // IGV 18%
            var cta_total = cta_bi + cta_igv;

            // Asignar los valores calculados a los campos correspondientes
            document.getElementById('cta_igv').value = cta_igv.toFixed(2);
            document.getElementById('cta_total').value = cta_total.toFixed(2);
        }
    </script>
</head>
<body>

<div class="container">
    <h1 class="text-center my-4">Editar Venta</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha_venta; ?>" required>
        </div>
        <div class="mb-3">
            <label for="cta_bi" class="form-label">Base Imponible</label>
            <input type="number" class="form-control" id="cta_bi" name="cta_bi" value="<?php echo $cta_bi; ?>" step="0.01" required oninput="calcularValores()">
        </div>
        <div class="mb-3">
            <label for="cta_igv" class="form-label">IGV</label>
            <input type="number" class="form-control" id="cta_igv" name="cta_igv" value="<?php echo $cta_igv; ?>" step="0.01" disabled>
        </div>
        <div class="mb-3">
            <label for="cta_total" class="form-label">Total</label>
            <input type="number" class="form-control" id="cta_total" name="cta_total" value="<?php echo $cta_total; ?>" step="0.01" disabled>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

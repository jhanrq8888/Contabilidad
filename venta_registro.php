<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WORKTECH SRL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
<!-- Contenedor para el Navbar -->
<div id="navbar-container"></div>

<!-- Cargar navbar.html usando JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch('navbar.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('navbar-container').innerHTML = data;
      })
      .catch(error => console.error('Error cargando el navbar:', error));
  });
</script>

</br>
</br>
</br>
    <div class="container">
        <h1 class="text-center">REGISTRO VENTA</h1>
    </div>
</br>

<?php
include("conexion_bd.php");  // Asegúrate de tener este archivo para la conexión
$conexion = conectar_bd();

// Consulta para obtener todas las ventas con la información del cliente
$sql = "SELECT v.id_venta, v.fecha, v.cta_bi, v.cta_igv, v.cta_total, c.nombre_cliente, c.apellido_paterno_cliente, c.apellido_materno_cliente 
        FROM ventas v 
        INNER JOIN cliente c ON v.cliente_id = c.id_cliente
        ORDER BY v.id_venta DESC";  // Ordenar por id de venta o fecha
$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Mostrar la tabla de ventas
    echo "<h3></h3>";
    echo "<table class='tabla-ventas'>
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Base Imponible</th>
                    <th>IGV</th>
                    <th>Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>";

    // Recorrer todas las filas y mostrarlas
    while ($venta = mysqli_fetch_assoc($resultado)) {
        // Formatear los valores numéricos
        $cta_bi = number_format($venta['cta_bi'], 2);
        $cta_igv = number_format($venta['cta_igv'], 2);
        $cta_total = number_format($venta['cta_total'], 2);
        // Formatear la fecha
        $fecha_venta = date('d/m/Y', strtotime($venta['fecha']));
        
        // Mostrar los datos en una fila de la tabla
        echo "<tr>
                <td>" . $venta['id_venta'] . "</td>
                <td>" . $venta['nombre_cliente'] . " " . $venta['apellido_paterno_cliente'] . " " . $venta['apellido_materno_cliente'] . "</td>
                <td>" . $fecha_venta . "</td>
                <td>S/ " . $cta_bi . "</td>
                <td>S/ " . $cta_igv . "</td>
                <td>S/ " . $cta_total . "</td>
                <td>
                    <a href='factura.php?id_venta=" . $venta['id_venta'] . "' class='btn-generar-factura'>Generar Factura</a>
                    <a href='editar_venta.php?id_venta=" . $venta['id_venta'] . "' class='btn-editar'>Editar</a>
                    <a href='eliminar_venta.php?id_venta=" . $venta['id_venta'] . "' class='btn-eliminar' onclick='return confirm(\"¿Estás seguro de eliminar esta venta?\");'>Eliminar</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>No hay ventas registradas.</p>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>

<!-- Estilos CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    h3 {
        text-align: center;
        color: #4CAF50;
        margin-top: 20px;
    }
    .tabla-ventas {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
    }
    .tabla-ventas th, .tabla-ventas td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }
    .tabla-ventas th {
        background-color: #4CAF50;
        color: white;
    }
    .tabla-ventas tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .tabla-ventas tr:hover {
        background-color: #e1f7d5;
    }
    .tabla-ventas td {
        color: #555;
    }
    .tabla-ventas td:hover {
        color: #000;
    }
    .btn-generar-factura, .btn-editar, .btn-eliminar {
        display: inline-block;
        padding: 8px 16px;
        margin: 0 5px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        color: white;
    }
    .btn-generar-factura {
        background-color: #4CAF50;
    }
    .btn-editar {
        background-color: #007bff;
    }
    .btn-eliminar {
        background-color: #dc3545;
    }
    .btn-generar-factura:hover {
        background-color: #45a049;
    }
    .btn-editar:hover {
        background-color: #0056b3;
    }
    .btn-eliminar:hover {
        background-color: #c82333;
    }
    p {
        text-align: center;
        font-size: 18px;
        color: #888;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>

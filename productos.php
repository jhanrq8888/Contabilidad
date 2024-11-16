<?php
include 'db_connect.php'; // Incluye el archivo de conexión

$sql = "SELECT * FROM producto";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Modelo</th>
            <th>Estado</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Salida de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_producto"] . "</td>";
                echo "<td>" . $row["descripcion_producto"] . "</td>";
                echo "<td>" . $row["precio_producto"] . "</td>";
                echo "<td>" . $row["cantidad_producto"] . "</td>";
                echo "<td><img src='images/" . $row["imagen_producto"] . "' alt='Imagen' width='100'></td>";
                echo "<td>" . $row["modelo_producto"] . "</td>";
                echo "<td>" . $row["estado_producto"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No se encontraron registros</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>

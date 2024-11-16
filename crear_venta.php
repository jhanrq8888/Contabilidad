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
    
        <h1 class="text-center">TABLA VENTA</h1>
    </div>
</br>

<?php


// Incluir la conexión a la base de datos
include("conexion_bd.php");

// Establecer la conexión con la base de datos
$conexion = conectar_bd();

$id_cliente = 0;

// Verificamos si se pasa un código de cliente en la URL
if (isset($_GET['codigoId']) && $_GET['codigoId'] != "") {
    $id_cliente = $_GET['codigoId'];
} else {
    $id_cliente = 0;
}

// Obtener los clientes desde la base de datos
$clientes = [];
$resultado_clientes = $conexion->query("SELECT * FROM cliente");
if ($resultado_clientes) {
    while ($cliente = $resultado_clientes->fetch_assoc()) {
        $clientes[] = $cliente;
    }
}

// Obtener los productos desde la base de datos
$productos = [];
$resultado_productos = $conexion->query("SELECT * FROM producto");
if ($resultado_productos) {
    while ($producto = $resultado_productos->fetch_assoc()) {
        $productos[] = $producto;
    }
}

// Si el formulario se ha enviado, procesamos la venta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $cliente_id = $_POST['cliente'];
    $productos_seleccionados = $_POST['producto'] ?? [];
    $cantidades = $_POST['cantidad'] ?? [];

    if (empty($productos_seleccionados)) {
        echo "<p class='error'>Debe seleccionar al menos un producto.</p>";
    } else {
        try {
            // Iniciar transacción
            $conexion->begin_transaction();

            // Inicializamos las variables para el cálculo
            $total_base = 0;
            $total_igv = 0;
            $detalles_venta = []; // Array para almacenar los detalles temporalmente

            // Calculamos el total base imponible y el IGV
            foreach ($productos_seleccionados as $producto_id) {
                $cantidad = intval($cantidades[$producto_id]);

                // Obtener el precio de cada producto
                $stmt = $conexion->prepare("SELECT precio_producto FROM producto WHERE id_producto = ?");
                $stmt->bind_param("i", $producto_id);
                $stmt->execute();
                $resultado_producto = $stmt->get_result();
                $producto_data = $resultado_producto->fetch_assoc();
                $precio_unitario = floatval($producto_data['precio_producto']);

                if ($precio_unitario > 0) {
                    $subtotal = $precio_unitario * $cantidad;
                    $total_base += $subtotal;
                    
                    // Guardar los detalles para usar después
                    $detalles_venta[] = [
                        'producto_id' => $producto_id,
                        'cantidad' => $cantidad,
                        'precio' => $subtotal
                    ];
                } else {
                    throw new Exception("Error: Producto con ID {$producto_id} no tiene precio registrado.");
                }
            }

            // Calcular el IGV (18%)
            $total_igv = $total_base * 0.18;
            $total = $total_base + $total_igv;

            // Insertar la venta en la tabla ventas
            $stmt = $conexion->prepare("INSERT INTO ventas (cliente_id, fecha, cta_bi, cta_igv, cta_total) VALUES (?, NOW(), ?, ?, ?)");
            $stmt->bind_param("iddd", $cliente_id, $total_base, $total_igv, $total);
            
            if ($stmt->execute()) {
                $venta_id = $conexion->insert_id;

                // Insertar los productos vendidos en la tabla detalles_venta
                $stmt_detalle = $conexion->prepare("INSERT INTO detalles_venta (venta_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)");
                
                foreach ($detalles_venta as $detalle) {
                    $stmt_detalle->bind_param("iiid", 
                        $venta_id, 
                        $detalle['producto_id'], 
                        $detalle['cantidad'], 
                        $detalle['precio']
                    );
                    $stmt_detalle->execute();
                }

                // Si todo salió bien, confirmar la transacción
                $conexion->commit();
                echo "<p class='success'>Venta registrada con éxito!</p>";
                echo "<p class='success'>Base Imponible: S/ " . number_format($total_base, 2) . "</p>";
                echo "<p class='success'>IGV: S/ " . number_format($total_igv, 2) . "</p>";
                echo "<p class='success'>Total: S/ " . number_format($total, 2) . "</p>";
            } else {
                throw new Exception("Error al insertar la venta");
            }
        } catch (Exception $e) {
            // Si hay algún error, revertir la transacción
            $conexion->rollback();
            echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!-- Formulario para registrar la venta -->


<form method="POST" class="form-container">
    <!-- Selección de Cliente -->
    <div class="form-group">
        <label for="cliente">Cliente:</label>
        <select name="cliente" id="cliente" required>
            <?php foreach ($clientes as $cliente) : ?>
                <option value="<?php echo $cliente['id_cliente']; ?>">
                    <?php echo $cliente['nombre_cliente'] . ' ' . 
                             $cliente['apellido_paterno_cliente'] . ' ' . 
                             $cliente['apellido_materno_cliente']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Selección de Productos y Cantidades -->
    <div class="form-group">
        <label for="productos">Productos:</label><br>
        <?php foreach ($productos as $producto) : ?>
            <div class='producto-item'>
                <input type='checkbox' name='producto[]' value='<?php echo $producto['id_producto']; ?>'>
                <?php echo $producto['descripcion_producto'] . ' - S/' . number_format($producto['precio_producto'], 2); ?>
                <label for='cantidad_<?php echo $producto['id_producto']; ?>'> Cantidad:</label>
                <input type='number' 
                       name='cantidad[<?php echo $producto['id_producto']; ?>]' 
                       id='cantidad_<?php echo $producto['id_producto']; ?>' 
                       min='1' 
                       value='1'>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="submit-btn">Registrar Venta</button>
</form>

<!-- Estilos CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    .form-container {
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
        color: #444;
    }

    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
        font-size: 16px;
    }

    .producto-item {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #eee;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .producto-item input[type="number"] {
        width: 80px;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .submit-btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .error {
        color: #d32f2f;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        margin: 10px 0;
        background-color: #fde8e8;
        border-radius: 4px;
    }

    .success {
        color: #2e7d32;
        text-align: center;
        font-weight: bold;
        padding: 10px;
        margin: 10px 0;
        background-color: #e8f5e9;
        border-radius: 4px;
    }

    /* Mejoras responsive */
    @media (max-width: 768px) {
        .form-container {
            width: 95%;
            padding: 15px;
        }

        .producto-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .producto-item input[type="number"] {
            width: 100%;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>
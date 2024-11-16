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
    
    </div>
</br>
<?php
include("conexion_bd.php");  // Asegúrate de tener este archivo para la conexión
include('fpdf.php');  // Asegúrate de incluir la librería FPDF

$conexion = conectar_bd();

// Obtener el ID de la venta
$id_venta = isset($_GET['id_venta']) ? $_GET['id_venta'] : 0;

if ($id_venta == 0) {
    echo "No se ha proporcionado un ID de venta válido.";
    exit;
}

// Consultar la información de la venta y del cliente
$sql = "SELECT v.id_venta, v.fecha, v.cta_bi, v.cta_igv, v.cta_total, 
               c.nombre_cliente, c.apellido_paterno_cliente, c.apellido_materno_cliente 
        FROM ventas v 
        INNER JOIN cliente c ON v.cliente_id = c.id_cliente
        WHERE v.id_venta = $id_venta";
$resultado = mysqli_query($conexion, $sql);
$venta = mysqli_fetch_assoc($resultado);

if (!$venta) {
    echo "Venta no encontrada.";
    exit;
}

// Formatear los valores numéricos
$cta_bi = number_format($venta['cta_bi'], 2);
$cta_igv = number_format($venta['cta_igv'], 2);
$cta_total = number_format($venta['cta_total'], 2);
$fecha_venta = date('d/m/Y', strtotime($venta['fecha']));

// Si el parámetro 'pdf' está presente, generar el PDF
if (isset($_GET['pdf']) && $_GET['pdf'] == '1') {
    // Crear el objeto PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Establecer título
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(190, 10, 'Factura de Venta', 0, 1, 'C');

    // Datos de la empresa
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 10, 'TU EMPRESA S.A.', 0, 1, 'C');
    $pdf->Cell(190, 10, 'RUC: 20XXXXXXXXX', 0, 1, 'C');
    $pdf->Cell(190, 10, 'Dirección de la Empresa', 0, 1, 'C');
    $pdf->Cell(190, 10, 'Teléfono: (01) XXX-XXXX', 0, 1, 'C');
    $pdf->Ln(10);

    // Datos del cliente
    $pdf->Cell(95, 10, 'Cliente: ' . $venta['nombre_cliente'] . ' ' . $venta['apellido_paterno_cliente'] . ' ' . $venta['apellido_materno_cliente'], 0, 1);
    $pdf->Cell(95, 10, 'Fecha: ' . $fecha_venta, 0, 1);
    $pdf->Ln(10);

    // Detalle de la venta
    $pdf->Cell(95, 10, 'Base Imponible: S/ ' . $cta_bi, 0, 1);
    $pdf->Cell(95, 10, 'IGV (18%): S/ ' . $cta_igv, 0, 1);
    $pdf->Cell(95, 10, 'Total: S/ ' . $cta_total, 0, 1);
    $pdf->Ln(10);

    // Firma y mensaje de agradecimiento
    $pdf->Cell(190, 10, 'Gracias por su preferencia.', 0, 1, 'C');

    // Generar el PDF y ofrecerlo para descarga
    $pdf->Output('D', 'Factura_Venta_' . $id_venta . '.pdf');  // 'D' para descargar
    exit;
}

?>

<!-- Diseño de la factura -->
<div class="factura">
    <h2 style="text-align: center;">Factura de Venta</h2>
    <div class="factura-header">
        <h3>TU EMPRESA S.A.</h3>
        <p>RUC: 20XXXXXXXXX<br>
        Dirección de la Empresa<br>
        Teléfono: (01) XXX-XXXX</p>
    </div>

    <div style="margin: 20px 0;">
        <h4>Datos del Cliente</h4>
        <p><strong>Cliente:</strong> <?php echo $venta['nombre_cliente'] . " " . $venta['apellido_paterno_cliente'] . " " . $venta['apellido_materno_cliente']; ?></p>
        <p><strong>Fecha:</strong> <?php echo $fecha_venta; ?></p>
    </div>

    <div>
        <h4>Detalle de la Venta</h4>
        <p><strong>Base Imponible:</strong> S/ <?php echo $cta_bi; ?></p>
        <p><strong>IGV (18%):</strong> S/ <?php echo $cta_igv; ?></p>
        <p><strong>Total:</strong> S/ <?php echo $cta_total; ?></p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <p>Gracias por su preferencia.</p>
    </div>

    <!-- Botón de descarga PDF -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="?id_venta=<?php echo $id_venta; ?>&pdf=1" class="button">Descargar PDF</a>
    </div>
</div>

<!-- Estilos de la factura -->
<style>
    .factura {
        width: 80%;
        margin: 20px auto;
        font-family: Arial, sans-serif;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: #fff;
    }
    .factura-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .factura h2 {
        color: #4CAF50;
    }
    .factura h4 {
        color: #333;
    }
    .factura p {
        font-size: 16px;
        line-height: 1.5;
    }
    .factura strong {
        font-weight: bold;
    }
    .button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
    }
    .button:hover {
        background-color: #45a049;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>
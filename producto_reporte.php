<?php
// Conexion BD
$mysqli = new mysqli("localhost","root","","sistema");
if ($mysqli->connect_errno){
    echo "Fallo al conectar a MySQL:(" . $mysqli->connect_errno .")" .$mysqli->connect_errno;
}




require('fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'REPORTE PRODUCTOS', 0, 1, 'C');
$pdf->Ln(10);

// Simulación de datos de encabezado
$pdf->SetFont('Arial', 'B', 12);
// Obtener la fecha y hora actual
date_default_timezone_set('America/La_Paz');
$fecha_actual = date('d-m-Y H:i');

// Agregar la fecha y hora al encabezado del PDF


$pdf->Cell(0, 10, 'Fecha Y Hora: '.$fecha_actual, 0, 1, 'L');

$pdf->Ln(5);
// Línea adicional
$pdf->SetLineWidth(0.5); // Grosor de la línea
                //INICIO ,X , FINAL   Y
                $pdf->Line($pdf->GetX(),$pdf->GetY(),270,$pdf->GetY()); 
                $pdf->Ln(5); // Espacio después de la línea

$tamano_tabla=275;
// Encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(($pdf->GetPageWidth() - $tamano_tabla) / 2); // Centramos la tabla
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Modelo', 1);
$pdf->Cell(70, 10, 'Descripcion', 1);
$pdf->Cell(20, 10, 'Cant', 1);
$pdf->Cell(20, 10, 'Precio', 1);
$pdf->Cell(70, 10, 'Imagen', 1);
$pdf->Cell(20, 10, 'Estado', 1);


$pdf->Ln();
// CONTENIDO DE LA TABLA -----------> CONSULTA DE CITA
$pdf->SetFont('Arial', '', 11);

//   VALORES DE LA TABLA
$sql= "SELECT * FROM `producto`";

$result = mysqli_query($mysqli, $sql);
while($personal_fila = $result->fetch_assoc()) {
    
    $pdf->SetX(($pdf->GetPageWidth() - $tamano_tabla) / 2);
    $pdf->Cell(10, 10, $personal_fila['id_producto'], 1);
    $pdf->Cell(30, 10, $personal_fila['modelo_producto'], 1);
    $pdf->Cell(70, 10, $personal_fila['descripcion_producto'], 1);
    $pdf->Cell(20, 10, $personal_fila['cantidad_producto'], 1);
    $pdf->Cell(20, 10, $personal_fila['precio_producto'], 1);
    $pdf->Cell(70, 10, $personal_fila['imagen_producto'], 1);
    $pdf->Cell(20, 10, $personal_fila['estado_producto'], 1);
    
  
    $pdf->Ln();
}



// Salida del PDF
$pdf->Output();

?>


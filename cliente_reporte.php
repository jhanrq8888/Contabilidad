<?php
// Conexion BD
$mysqli = new mysqli("localhost","root","","sistema");
if ($mysqli->connect_errno){
    echo "Fallo al conectar a MySQL:(" . $mysqli->connect_errno .")" .$mysqli->connect_errno;
}




// realizamos la lista de todos los registros
/////////// GENERAR REPORTE DE PAGO ////////////////////////
///////////////////////////////////////////////////////////
require('fpdf.php');

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'REPORTE CLIENTES', 0, 1, 'C');
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
$pdf->Cell(15, 10, 'Sexo', 1);
$pdf->Cell(30, 10, 'Nombre', 1);
$pdf->Cell(30, 10, 'App Paterno', 1);
$pdf->Cell(30, 10, 'App Materno', 1);
$pdf->Cell(60, 10, 'Correo', 1);
$pdf->Cell(60, 10, 'Direccion', 1);
$pdf->Cell(25, 10, 'Telefono', 1);

$pdf->Ln();
// CONTENIDO DE LA TABLA -----------> CONSULTA DE CITA
$pdf->SetFont('Arial', '', 11);

//   VALORES DE LA TABLA
$sql= "SELECT * FROM `cliente`";
 // realizar la consulta      $personal_fila['id_cita']  
$result = mysqli_query($mysqli, $sql);
while($personal_fila = $result->fetch_assoc()) {
    
    $pdf->SetX(($pdf->GetPageWidth() - $tamano_tabla) / 2);
    $pdf->Cell(10, 10, $personal_fila['id_cliente'], 1);
    $pdf->Cell(15, 10, $personal_fila['genero_cliente'], 1);
    $pdf->Cell(30, 10, $personal_fila['nombre_cliente'], 1);
    $pdf->Cell(30, 10, $personal_fila['apellido_paterno_cliente'], 1);
    $pdf->Cell(30, 10, $personal_fila['apellido_materno_cliente'], 1);
    $pdf->Cell(60, 10, $personal_fila['email_cliente'], 1);
    $pdf->Cell(60, 10, $personal_fila['direccion_cliente'], 1);
    $pdf->Cell(25, 10, $personal_fila['telefono_cliente'], 1);
  
    $pdf->Ln();
}



// Salida del PDF
$pdf->Output();

?>


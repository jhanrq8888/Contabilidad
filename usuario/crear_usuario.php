<?php
require_once ('../config/conexion.php');
 $conexion =conectar_bd();

//Obtener datos del formulario Index por el me
    $username = $_POST['nombre_usuario'];
    $password = $_POST['password_usuario'];
    
 
 // Preparar la consulta SQL
$sql = "INSERT INTO `usuario` ( `nombre_usuario`, `password_usuario`) VALUES ( '$username', '$password')";
$stmt = $conexion->prepare($sql);
 // Ejecutar la consulta
 $stmt->execute();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirección</title>
    <script>
        // Redireccionar después de 5 segundos (5000 milisegundos)
        setTimeout(function() {
            window.location.href = 'http://localhost/Sistema/pagina_principal.html'; 
        }, 5000);
    </script>
</head>
<body>
    <p>Registro Exitoso !</p>
</body>
</html>
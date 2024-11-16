<?php
require_once ('../config/conexion.php');
 $conexion =conectar_bd();

//Obtener datos del formulario Index por el me
    $username = $_POST['usuario_login'];
    $password = $_POST['password_login'];
    
 
 // Preparar la consulta SQL
$sql = "SELECT * FROM usuario WHERE nombre_usuario='$username' AND password_usuario='$password'";
$stmt = $conexion->prepare($sql);
 // Ejecutar la consulta
 $stmt->execute();
// Obtener los resultados
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // Comprobar si se encontró algún resultado
      if (count($resultados) > 0) {
        // Recorrer los resultados
        foreach ($resultados as $fila) {
           // echo 'Bienvenido, ' . $fila['nombre_usuario'] . '<br>';
               // Redireccionar a una página de bienvenida
    header('Location: ../pagina_principal.html');
            exit();
        }
    } else {
        echo 'Nombre o contraseña incorrectos.';
    }
?>
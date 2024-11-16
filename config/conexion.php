<?php

function conectar_bd(){
$host = 'localhost';
$dbname = 'sistema';
$username= 'root';
$password= '';

// manejo de exepciones
try{

    //conectar por pdo      
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
    // Configurar PDO para lanzar excepciones en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    return $conn;
} catch(PDOException $e) {
    // Capturar cualquier excepción que PDO pueda lanzar
    echo "Error de conexión: " . $e->getMessage();
}
}
?>
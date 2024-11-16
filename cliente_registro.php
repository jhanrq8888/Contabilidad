<?php

include ("conexion_bd.php");
$conexion = conectar_bd();

   
    $genero=$_POST['genero'];
    $nombre=$_POST['nombre'];
    $appPaterno=$_POST['appPaterno'];
    $appMaterno=$_POST['appMaterno'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];


  

   

        // consulta '$fecha_registro'
        $sql="INSERT INTO `cliente` ( `nombre_cliente`, `apellido_paterno_cliente`, `apellido_materno_cliente`, `email_cliente`, `direccion_cliente`, `genero_cliente`, `telefono_cliente`) VALUES ('$nombre', '$appPaterno', '$appMaterno', '$correo', '$direccion', '$genero', '$telefono')";

        // ejecutamos despues de agregar la conexion
        
        $ejecutar = mysqli_query($conexion, $sql);
        
        if(!$ejecutar){
            echo "cargar datos";
        } else{
            echo "Datos Guardados Correctamente<br><a href= '/sistema/cliente_inicio.php'>Inicio</a>";
        }
    
    


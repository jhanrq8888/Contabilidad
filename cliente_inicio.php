<?php
include("conexion_bd.php");
$conexion = conectar_bd();
    $id_cliente=0;
if (isset($_GET['codigoId'])!="") {
    
    $id_cliente=$_GET['codigoId'];
    //$id_paciente=$_GET['codigoId'];

}else{
    $id_cliente=0;
}




?>

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
    
        <h1 class="text-center">TABLA CLIENTE</h1>
    </div>
</br>


<div class="container">
        
        <div class="form-control mb-3">
            <form  action="cliente_inicio.php" method="GET" id="buscarID">

           <div class="form-group row">
               
               <div class="col-6 mb-3">
                   <div class="mb-3">
                       <label for="codigoId" class="form-label">Busqueda por ID:</label>
                       <input type="text" class="form-control" id="codigoId" name="codigoId" aria-describedby="codigoIdHelp" required>
                       <div id="codigoIdHelp" class="form-text">Ingrese el ID del cliente. </div>
                    </div>
                
                </div>
            
            
            <div class="col-6 mb-3">
            <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-lg" id="busquedaId"  >Buscar</button>
                    </div>
                </div>
                
            </div>
            
        </form>
        
     </div>
    
    </div>

    </br>
   





    
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Correo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Género</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
                
            
            </tr>
        </thead>
            <tbody>
                <?php


        // leer la base de datos
        
        if($id_cliente!=0&&$id_cliente!=""){
            $sql= "SELECT * FROM `cliente` WHERE `id_cliente` = $id_cliente";
            $result = mysqli_query($conexion, $sql);

        }else{
            $sql= "SELECT * FROM `cliente`";
            $result = mysqli_query($conexion, $sql);
        }
        // si no hay busqueda generamos toda la lista 
         
        

            foreach($result as $valor){
                echo "<tr>";
                // campos de la bd -> cliente
                echo "<td>" . $valor["id_cliente"] . "</td>";
                echo "<td>" . $valor["nombre_cliente"] . "</td>";
                echo "<td>" . $valor["apellido_paterno_cliente"] . "</td>";
                echo "<td>" . $valor["apellido_materno_cliente"] . "</td>";
                echo "<td>" . $valor["email_cliente"] . "</td>";
                echo "<td>" . $valor["direccion_cliente"] . "</td>";
                echo "<td>" . $valor["genero_cliente"] . "</td>";
                echo "<td>" . $valor["telefono_cliente"] . "</td>";       
             
                $id_cliente1=$valor['id_cliente'];
                $nombre_cliente1=$valor['nombre_cliente'];
                // registro
                //$url_registro = "/worktech/producto/producto_registro.html?id_cliente=$id_cliente1";
                // editar
                $url_editar_cliente = "cliente_editar.php?id_cliente=$id_cliente1";
                // ver
                $url_ver_cliente = "cliente_ver.php?id_cliente=$id_cliente1";
                // eliminar
                $url_eliminar_cliente="cliente_eliminar.php?id_cliente=$id_cliente1";
                ?>
                
                <td>
              <a type="button" class="btn btn-success" href="<?php echo $url_ver_cliente; ?>">Ver</a>
              <a type="button" class="btn btn-warning" href="<?php echo $url_editar_cliente; ?>">Editar </a>
              <a type="button" class="btn btn-danger" href="<?php echo $url_eliminar_cliente; ?>">Eliminar</a>
                </td>
                <?php  
            };

               ?>

</tbody>
</table>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>
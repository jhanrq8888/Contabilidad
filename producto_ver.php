<?php

include("conexion_bd.php");
$conexion = conectar_bd();
$id_producto = $_GET['id_producto'];
$sql= "SELECT * FROM `producto` WHERE `id_producto` = $id_producto";
$result = mysqli_query($conexion, $sql);
foreach($result as $valor){
    
    // campos de la bd -> cliente
  
   $descripcion= $valor["descripcion_producto"];
   $precio= $valor["precio_producto"];
   $cantidad= $valor["cantidad_producto"];
    $imagen=$valor["imagen_producto"];
    $modelo=$valor["modelo_producto"];
    $estado = $valor["estado_producto"];
    }
     
    ?>
    
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Worktech SRL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
      .error {
        color: red;
      }
    </style>
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
    <h1 class="text-center">Ver Producto</h1>
  </div>
  </br>

  <div class="container">
    <div class="form-control mb-3">
      <form id="formulario-producto" action="producto_inicio.php" >
       

        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="modelo" class="form-label">Modelo :</label>
            <input type="text" class="form-control" id="modelo" name="modelo" aria-describedby="modeloHelp" value =" <?php echo $modelo?>" readonly>
           
          </div>

          <div class="col-8 mb-3">
            <label for="descripcion" class="form-label">Descripción :</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="descripcionHelp" value =" <?php echo $descripcion?>" readonly>
           
          </div>


        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="cantidad" class="form-label">Cantidad :</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad" aria-describedby="cantidadHelp" min="1" value =" <?php echo $cantidad?>" readonly>
           
          </div>
          <div class="col-4 mb-3">
            <label for="precio" class="form-label">Precio :</label>
            <input type="text" class="form-control" id="precio" name="precio" aria-describedby="precioHelp" min="1000" value =" <?php echo $precio?>" readonly>
        
          </div>
          <div class="col-4 mb-3">
            <label for="estado" class="form-label">Estado :</label>
            <input type="text" class="form-control" id="estado" name="estado" aria-describedby="estadoHelp" min="1000" value =" <?php echo $estado?>" readonly>
           
          </div>

         

        <div class="form-group row">
            <div class="col-4 mb-3">
                <label for="imagen" class="form-label">Imagen :</label>
                <input type="text" class="form-control" id="imagen" name="imagen" aria-describedby="imagenHelp" value =" <?php echo $imagen?>" readonly>
                
              </div>
        </div>

        <div class="form-group row">
          <span id="error-message" class="error"></span><br><br>
        </div>

        <div class="form-group row">
          <div class="col-12 text-center d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Volver</button>
          </div>
        </div>
      </form>
    </div>
  </div>

 




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>


</body>

</html>
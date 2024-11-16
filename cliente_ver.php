<?php

include ("conexion_bd.php");
$conexion = conectar_bd();

$id_cliente = $_GET['id_cliente'];
$sql= "SELECT * FROM `cliente` WHERE `id_cliente` = $id_cliente";
$result = mysqli_query($conexion, $sql);
foreach($result as $valor){
    
    // campos de la bd -> cliente
    $valor["id_cliente"];
    $valor["nombre_cliente"];
    $valor["apellido_paterno_cliente"];
    $valor["apellido_materno_cliente"];
    $valor["email_cliente"];
    $valor["direccion_cliente"];
    $valor["genero_cliente"];
    $valor["telefono_cliente"]; 
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
    <h1 class="text-center">Ver Cliente</h1>
  </div>
  </br>

  <div class="container">
    <div class="form-control mb-3">
      <form id="formulario-cliente" action="cliente_inicio.php" >
        <div class="form-group row">
        <div class="col-6 mb-3">
            <label for="id_cliente" class="form-label">ID Cliente :</label>
            <input type="text" class="form-control" id="id_cliente" name="id_cliente"  aria-describedby="id_clienteHelp" value="<?php echo $valor["id_cliente"]; ?>" readonly >
          
          </div>
          <div class="col-6 mb-3">
            <label for="genero" class="form-label">Genero :</label>
            <input type="text" class="form-control" id="genero" name="genero"  aria-describedby="generoHelp" value="<?php echo $valor["genero_cliente"]; ?>" readonly >
       
          </div>
        </div>

        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="nombre" class="form-label">Nombre :</label>
            <input type="text" class="form-control" id="nombre" name="nombre"  aria-describedby="nombreHelp" value="<?php echo $valor["nombre_cliente"]; ?>" readonly >
            
          </div>

          <div class="col-4 mb-3">
            <label for="appPaterno" class="form-label">Apellido Paterno :</label>
            <input type="text" class="form-control" id="appPaterno" name="appPaterno" aria-describedby="appPaternoHelp" value="<?php echo $valor["apellido_paterno_cliente"]; ?>" readonly>
        
          </div>

          <div class="col-4 mb-3">
            <label for="appMaterno" class="form-label">Apellido Materno :</label>
            <input type="text" class="form-control" id="appMaterno" name="appMaterno" aria-describedby="appMaternoHelp" value="<?php echo $valor["apellido_materno_cliente"]; ?>" readonly>
           
          </div>
        </div>

        <div class="form-group row">
          <div class="col-8 mb-3">
            <label for="direccion" class="form-label">Dirección :</label>
            <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp" value="<?php echo $valor["direccion_cliente"]; ?>" readonly>
         
          </div>

          <div class="col-4 mb-3">
            <label for="correo" class="form-label">Correo Electrónico :</label>
            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="correoHelp" value="<?php echo $valor["email_cliente"]; ?>" readonly>
      
          </div>
        </div>

        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="telefono" class="form-label">Teléfono :</label>
            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" value="<?php echo $valor["telefono_cliente"]; ?>" readonly>
      
          </div>
        </div>

        <div class="form-group row">
          <span id="error-message" class="error"></span><br><br>
        </div>

        <div class="form-group row">
          <div class="col-12 text-center d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Volver Atras</button>
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
        
    
        

    
    


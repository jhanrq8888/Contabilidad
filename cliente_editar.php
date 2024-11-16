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
    <h1 class="text-center">Editar Cliente</h1>
  </div>
  </br>

  <div class="container">
    <div class="form-control mb-3">
      <form id="formulario-cliente" action="cliente_funcion_editar.php" method="POST" >
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
            <input type="text" class="form-control" id="nombre" name="nombre"  aria-describedby="nombreHelp" value="<?php echo $valor["nombre_cliente"]; ?>"  >
            
          </div>

          <div class="col-4 mb-3">
            <label for="appPaterno" class="form-label">Apellido Paterno :</label>
            <input type="text" class="form-control" id="appPaterno" name="appPaterno" aria-describedby="appPaternoHelp" value="<?php echo $valor["apellido_paterno_cliente"]; ?>" >
        
          </div>

          <div class="col-4 mb-3">
            <label for="appMaterno" class="form-label">Apellido Materno :</label>
            <input type="text" class="form-control" id="appMaterno" name="appMaterno" aria-describedby="appMaternoHelp" value="<?php echo $valor["apellido_materno_cliente"]; ?>" >
           
          </div>
        </div>

        <div class="form-group row">
          <div class="col-8 mb-3">
            <label for="direccion" class="form-label">Dirección :</label>
            <input type="text" class="form-control" id="direccion" name="direccion" aria-describedby="direccionHelp" value="<?php echo $valor["direccion_cliente"]; ?>" >
         
          </div>

          <div class="col-4 mb-3">
            <label for="correo" class="form-label">Correo Electrónico :</label>
            <input type="email" class="form-control" id="correo" name="correo" aria-describedby="correoHelp" value="<?php echo $valor["email_cliente"]; ?>" >
      
          </div>
        </div>

        <div class="form-group row">
          <div class="col-4 mb-3">
            <label for="telefono" class="form-label">Teléfono :</label>
            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefonoHelp" value="<?php echo $valor["telefono_cliente"]; ?>" >
      
          </div>
        </div>

        <div class="form-group row">
          <span id="error-message" class="error"></span><br><br>
        </div>

        <div class="form-group row">
          <div class="col-12 text-center d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg">Editar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Función para validar nombres (solo letras y espacios)
    function validarNombre(nombre) {
      let nombreRegex = /^[A-Za-z\s]+$/;
      if (!nombreRegex.test(nombre)) {
        return "El nombre solo debe contener letras y espacios.";
      }
      return ""; // No hay error
    }

    // Función para validar correos electrónicos
    function validarEmail(email) {
      let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        return "El correo electrónico no es válido.";
      }
      return ""; // No hay error
    }

    // Función para validar números (teléfono, solo dígitos y mínimo 8 caracteres)
    function validarTelefono(telefono) {
      let telefonoRegex = /^[0-9]{8,}$/;
      if (!telefonoRegex.test(telefono)) {
        return "El teléfono debe contener al menos 8 dígitos.";
      }
      return ""; // No hay error
    }

    // Función para validar direcciones
    function validarDireccion(direccion) {
      let direccionRegex = /^[A-Za-z0-9\s.,#/-]+$/;
      if (!direccionRegex.test(direccion)) {
        return "La dirección solo debe contener letras, números, espacios y caracteres permitidos (. , - # /).";
      }
      return ""; // No hay error
    }

    // Validación al enviar el formulario
    document.getElementById('formulario-cliente').addEventListener('submit', function (event) {
      let nombre = document.getElementById('nombre').value;
      let appPaterno = document.getElementById('appPaterno').value;
      let appMaterno = document.getElementById('appMaterno').value;
      let direccion = document.getElementById('direccion').value;
      let correo = document.getElementById('correo').value;
      let telefono = document.getElementById('telefono').value;
      let errorMessage = document.getElementById('error-message');

      errorMessage.textContent = ""; // Limpiar mensajes anteriores
      let errores = [];

      // Validar nombre
      let errorNombre = validarNombre(nombre);
      if (errorNombre) {
        errores.push(errorNombre);
      }
       // Validar Apellido Paterno
      let errorAppPaterno = validarNombre(appPaterno);
      if (errorAppPaterno) {
        errores.push("El apellido paterno solo debe contener letras.");
      }
       // Validar Apellido Materno
       let errorAppMaterno = validarNombre(appMaterno);
      if (errorAppMaterno) {
        errores.push("El apellido materno solo debe contener letras.");
      }

      // Validar correo electrónico
      let errorEmail = validarEmail(correo);
      if (errorEmail) {
        errores.push(errorEmail);
      }

      // Validar teléfono
      let errorTelefono = validarTelefono(telefono);
      if (errorTelefono) {
        errores.push(errorTelefono);
      }

      // Validar dirección
      let errorDireccion = validarDireccion(direccion);
      if (errorDireccion) {
        errores.push(errorDireccion);
      }

      // Mostrar mensajes de error si los hay
      if (errores.length > 0) {
        event.preventDefault(); // Prevenir el envío del formulario
        errorMessage.innerHTML = errores.join("<br>"); // Mostrar cada error en una línea separada
      }
    });
  </script>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>


</body>

</html>
        
    
        

    
    


<?php
include("conexion_bd.php");
$conexion = conectar_bd();
$id_cliente = 0;
if (isset($_GET['codigoId']) != "") {

    $id_cliente = $_GET['codigoId'];
    //$id_paciente=$_GET['codigoId'];

} else {
    $id_cliente = 0;
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
        document.addEventListener("DOMContentLoaded", function() {
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

        <h1 class="text-center">TABLA PRODUCTO </h1>
        <a href="http://localhost:5173/productos">Ver productos</a>
        <a href="/sistema/producto_registro.html" style="margin-left: 20px;">Agregar producto</a>
    </div>
    </br>


    <div class="container">

        <div class="form-control mb-3">
            <form action="producto_inicio.php" method="GET" id="buscarID">

                <div class="form-group row">

                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <label for="codigoId" class="form-label">Busqueda por ID:</label>
                            <input type="text" class="form-control" id="codigoId" name="codigoId" aria-describedby="codigoIdHelp" required>
                            <div id="codigoIdHelp" class="form-text">Ingrese el ID del producto. </div>
                        </div>

                    </div>


                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg" id="busquedaId">Buscar</button>
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
                    <th scope="col">Modelo</th>
                    <th scope="col">Descripción Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Estado</th>



                </tr>
            </thead>
            <tbody>
                <?php


                // leer la base de datos

                if ($id_cliente != 0 && $id_cliente != "") {
                    $sql = "SELECT * FROM `producto` WHERE `id_producto` = $id_cliente";
                    $result = mysqli_query($conexion, $sql);
                } else {
                    $sql = "SELECT * FROM `producto`";
                    $result = mysqli_query($conexion, $sql);
                }
                // si no hay busqueda generamos toda la lista 



                foreach ($result as $valor) {
                    $imagen = $valor["imagen_producto"];
                    echo "<tr>";
                    // campos de la bd -> cliente
                    echo "<td>" . $valor["id_producto"] . "</td>";
                    echo "<td>" . $valor["modelo_producto"] . "</td>";
                    echo "<td>" . $valor["descripcion_producto"] . "</td>";
                    echo "<td>" . $valor["cantidad_producto"] . "</td>";
                    echo "<td>" . $valor["precio_producto"] . "</td>";
                    echo "<td>" . $valor["imagen_producto"] . "<button onclick='mostrarImagen(\"$imagen\")'>Ver</button></td>";
                    echo "<td>" . $valor["estado_producto"] . "</td>";


                    $id_producto1 = $valor['id_producto'];


                    $url_editar_producto = "producto_editar.php?id_producto=$id_producto1";
                    // ver
                    $url_ver_producto = "producto_ver.php?id_producto=$id_producto1";
                    // eliminar
                    $url_eliminar_producto = "producto_eliminar.php?id_producto=$id_producto1";
                ?>

                    <td>
                        <a type="button" class="btn btn-success" href="<?php echo $url_ver_producto; ?>">Ver</a>
                        <a type="button" class="btn btn-warning" href="<?php echo $url_editar_producto; ?>">Editar </a>
                        <a type="button" class="btn btn-danger" href="<?php echo $url_eliminar_producto; ?>">Eliminar</a>
                    </td>
                <?php
                };

                ?>

            </tbody>
        </table>


    </div>

    <script>
        function mostrarImagen(nombreImagen) {
            console.log("ver imagen", nombreImagen);
            window.open("imagenes/" + nombreImagen, '_blank');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>
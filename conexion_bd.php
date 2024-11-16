<?php

// Puerto -> Host
$host = "localhost";
// usuario db
$usuario = "root";
// contraseña bd
$contraseña = "";
// Nombre de la bd
$base_datos = "sistema";

function conectar_bd()
{
  global $host, $usuario, $contraseña, $base_datos;
  // usamos el metodo conectar
  $conectar = mysqli_connect($host, $usuario, $contraseña);

  mysqli_select_db($conectar, $base_datos);
  //print_r ($conectar);
  return $conectar;
};

function conectar_db_poo()
{
  global $host, $usuario, $contraseña, $base_datos;
  // usamos el metodo conectar
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $mysqli = new mysqli($host, $usuario, $contraseña, $base_datos);
  return $mysqli;
}

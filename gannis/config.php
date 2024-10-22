<?php
define("quiereMascotas", true);
define("quiereUsuarios", true);
define("regMasc", 20);
define("regUsu", 20);


define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "gannis");

define('CANT_REG_PAG', 15);

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

function localidad($barr, $prov)
{
  $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  $location = [];
  $sql = "SELECT provincia FROM provincias WHERE id = " . $prov;
  $result = mysqli_query($con, $sql);
  $prov = mysqli_fetch_assoc($result);
  $sql = "SELECT barrio FROM barrios WHERE id = " . $barr;
  $result = mysqli_query($con, $sql);
  $barr = mysqli_fetch_assoc($result);


  array_push($location, $prov['provincia']);
  array_push($location, $barr['barrio']);

  return $location;
}

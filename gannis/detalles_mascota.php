<?php
require_once("config.php");

$b = $_GET['id'];

$sql = "SELECT * FROM mascotas_organizaciones WHERE mascota_id = " . $b;
$res = mysqli_query($con, $sql);
$id_org = mysqli_fetch_assoc($res);

$sql = "SELECT * FROM usuarios WHERE id = " . $id_org['usuario_id'];
$res = mysqli_query($con, $sql);

$org = mysqli_fetch_assoc($res);


$query = "SELECT * FROM mascotas WHERE id = " . $b;

$resultado = mysqli_query($con, $query);
if (!$resultado) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$mascotas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


$consulta = "SELECT usuario_id FROM mascotas_organizaciones WHERE mascotas_organizaciones.mascota_id=" . $b;
$result = mysqli_query($con, $consulta);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$usu = mysqli_fetch_all($result);

$cons = "SELECT mascotas.nombre, mascotas.sexo, mascotas.edad, mascotas.id FROM mascotas_organizaciones INNER JOIN mascotas ON mascotas_organizaciones.mascota_id = mascotas.id WHERE mascotas_organizaciones.usuario_id = " . $usu[0][0];
$result = mysqli_query($con, $cons);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$mascota = mysqli_fetch_all($result, MYSQLI_ASSOC);

$path    = 'img/mascotas/' . $b;

if (file_exists($path)) {
  $rutas = scandir($path);

  if (count($rutas) > 1) {
    foreach ($rutas as $index => $ruta) {
    }
  }

  $directorio = "img/mascotas/" . $b;
  $archivo = scandir($directorio);
}

$consultae = "SELECT usuario_id FROM mascotas_organizaciones WHERE mascotas_organizaciones.mascota_id=" . $b;
$result = mysqli_query($con, $consulta);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}
$usue = mysqli_fetch_assoc($result);

$view = "detalles_mascota";
require_once "views/layout.php";

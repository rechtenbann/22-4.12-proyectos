<?php
include("config.php");
$nombre_org = $_POST['nombre_org'];
$correo_org = $_POST['correo_org'];
$celular_org = $_POST['celular_org'];
$prov_org = $_POST['prov_org'];
$bar_org = $_POST['bar'];


// verificar que el correo no se repita en la base de datos
$consult = "SELECT * FROM usuarios WHERE mail = '$correo_org' ";
$verificar_mail = mysqli_query($con, $consult);

if (mysqli_num_rows($verificar_mail) > 0) {
  require_once "config.php";
  $query = "SELECT * FROM provincias";
  $resultado = mysqli_query($con, $query);
  if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
  }
  $msj = "¡Este Email ya esta registrado!";
  $provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
  $view = "registro_organizacion";
  require_once "views/layout.php";
  exit();
}

if ($_POST['bar'] == 0) {
  require_once "config.php";
  $query = "SELECT * FROM provincias";
  $resultado = mysqli_query($con, $query);
  if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
  }
  $msj = "¡Elija un barrio valido!";
  $provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
  $view = "registro_organizacion";
  require_once "views/layout.php";
  exit();
}
///////////////////////////////////////////////////////////

$query = "SELECT id FROM provincias WHERE id = '$prov_org'";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}
$provincia = mysqli_fetch_assoc($resultado);

$query = "SELECT id FROM barrios WHERE id = '$bar_org'";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$barrio = mysqli_fetch_assoc($resultado);

if ($_POST['contrasenaA'] == $_POST['contrasena_ado'] && $_POST['barrio'] !== 0) {
  $contrasena_ado = password_hash(trim($_POST['contrasena_ado']), PASSWORD_BCRYPT);

  $query = "INSERT INTO usuarios(nombre,  mail, telefono, provincia_id, barrio_id, contrasena) VALUES('$nombre_org' ,'$correo_org','$celular_org','" . $prov_org . "','" . $bar_org . "','" . $contrasena_ado . "')";

  $resultado = mysqli_query($con, $query);
  if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
  }

  $id_usu = mysqli_insert_id($con);

  $query2 = "INSERT INTO rol_usuarios (rol_id, usuario_id) VALUES(2, '$id_usu')";

  $result = mysqli_query($con, $query2);
  if (!$result) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
  }
  $sql = "SELECT usuarios.id, usuarios.contrasena, usuarios.provincia_id, usuarios.barrio_id, rol_usuarios.rol_id, usuarios.nombre, usuarios.mail, usuarios.telefono, usuarios.cumpleanios, usuarios.edad, usuarios.fecha_alta FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE usuarios.mail = '" . $_POST['correo_org'] . "'";
  $usuario = mysqli_fetch_assoc(mysqli_query($con, $sql));
  if (!$usuario) {
    header("Location: mascotas.php");
    $msj = "Algo salio mal";
    exit();
  }
  $pass = $usuario['contrasena'];
  if (password_verify($_POST['contrasena_ado'], $pass)) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
  }
} else {
  $query = "SELECT * FROM provincias";
  $resultado = mysqli_query($con, $query);
  if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
  }
  $msj = "¡Las contraseñas no coinciden!";
  $provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
  $view = "registro_organizacion";
  require_once "views/layout.php";
  exit();
}

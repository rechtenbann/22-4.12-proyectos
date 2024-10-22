<?php
if ($_POST['mail'] == "" || $_POST['contrasena'] == "") {
  header("Location: index.php");
}
require_once "config.php";

$sql = "SELECT usuarios.id, usuarios.contrasena, usuarios.provincia_id, usuarios.barrio_id, rol_usuarios.rol_id, usuarios.nombre, usuarios.mail, usuarios.telefono, usuarios.cumpleanios, usuarios.edad, usuarios.fecha_alta FROM usuarios INNER JOIN rol_usuarios ON usuarios.id = rol_usuarios.usuario_id WHERE usuarios.mail = '" . $_POST['mail'] . "'";
$usuario = mysqli_fetch_assoc(mysqli_query($con, $sql));

setcookie('mail', $_POST['mail']);
$_COOKIE = $_POST;
if ($usuario) {

  $pass = $usuario['contrasena'];
  if (password_verify($_POST['contrasena'], $pass)) {
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
  }

  //COOKIES

  if (isset($_POST['recordar']) && $_POST['recordar'] == 'SI') {
    setcookie('mail', $_POST['mail']);
    setcookie('contrasena', $_POST['contrasena']);
    setcookie('recordar', $_POST['recordar']);
    $_COOKIE = $_POST;
  } else if (isset($_POST['mail']) && !isset($_POST['recordar'])) {

    setcookie('mail', $_POST['mail']);
    setcookie('contrasena', '');
    setcookie('recordar', '');
    unset($_COOKIE['contrasena']);
    unset($_COOKIE['recordar']);
  }

  $view = "inicio_sesion";
  $msj = "Contraseña incorrecta";
  require_once "inicio_sesion.php";
  require_once "index.php";
}

unset($_COOKIE['contrasena']);
unset($_COOKIE['recordar']);
$view = "home";
$msj = "Correo incorrecto o invalido";
require_once "inicio_sesion.php";
require_once "index.php";

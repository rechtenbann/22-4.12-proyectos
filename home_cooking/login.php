<?php
require_once "config.php";

if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $contra = $_POST['password'];

    $sql = "SELECT usuarios.id, usuarios.password , usuarios.nombre_usuario, usuarios.nombre, usuarios.genero, usuarios.mail,usuarios.biografia, rango_usuarios.rango_id FROM usuarios INNER JOIN rango_usuarios ON usuarios.id = rango_usuarios.usuario_id WHERE mail = '$mail'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $r_assoc = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) == 1 && password_verify($contra, $r_assoc[0]['password'])) {
        session_start();
        $_SESSION['usuario_activo'] = array();
        $_SESSION['usuario_activo']['id'] = $r_assoc[0]['id'];
        $_SESSION['usuario_activo']['nombre_usuario'] = $r_assoc[0]['nombre_usuario'];
        $_SESSION['usuario_activo']['nombre'] = $r_assoc[0]['nombre'];
        $_SESSION['usuario_activo']['genero'] = $r_assoc[0]['genero'];
        $_SESSION['usuario_activo']['mail'] = $r_assoc[0]['mail'];
        $_SESSION['usuario_activo']['biografia'] = $r_assoc[0]['biografia'];
        $_SESSION['usuario_activo']['rango_id'] = $r_assoc[0]['rango_id'];
        $header = true;
    }
    $msj = "<div class='alert alert-danger' role='alert'>Email o contraseña incorrectos</div>";
}
$msj = "<div class='alert alert-danger' role='alert'>Email o contraseña incorrectos</div>";

//cookies FOLCO

if (isset($_POST['recordar']) && $_POST['recordar'] == 'SI') {
    setcookie('mail', $_POST['mail']);
    setcookie('password', $_POST['password']);
    setcookie('recordar', $_POST['recordar']);
    $_COOKIE = $_POST;
  } 
else if (isset($_POST['mail']) && !isset($_POST['recordar'])) {
  
    setcookie('mail', '');
    setcookie('password', '');
    setcookie('recordar', '');
    unset($_COOKIE); 
  }

if(isset($header)){
  $return = array("header" => $header);
} 
else{
  $return = array("header" => false, "msj" => $msj);
}
echo json_encode($return);

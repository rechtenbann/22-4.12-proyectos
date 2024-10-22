<?php
if (!empty($_POST)) {

    require_once "config.php";

    $nombre = $_POST['nombre'];
    $usuarios = $_POST['usuario'];
    $mail = $_POST['mail'];
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $genero = $_POST['select'];

    $query = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre_usuario = '$usuarios'");
    if (!$query) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $queryb = mysqli_query($con, "SELECT * FROM usuarios WHERE  mail = '$mail'");
    if (!$queryb) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    $queryc = mysqli_query($con, "SELECT * FROM usuarios WHERE nombre_usuario = '$usuarios' AND mail = '$mail'");
    if (!$queryc) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }

    if (mysqli_num_rows($queryc) == 0) {
        if (mysqli_num_rows($queryb) == 0) {
            if (mysqli_num_rows($query) == 0) {
                if ($password === $password2) {

                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $query_insert = mysqli_query($con, "INSERT INTO usuarios (nombre_usuario, nombre, genero, mail, password) 
                                                VALUES('$usuarios','$nombre','$genero','$mail','$password')");
                    if (!$query_insert) {
                        echo "Fallo consulta: " . mysqli_error($con);
                        exit();
                    }

                    $id_usu = mysqli_insert_id($con);

                    $consul = "INSERT INTO rango_usuarios (usuario_id, rango_id) VALUES ('$id_usu', 1 ) ";
                    $result = mysqli_query($con, $consul);
                    if (!$result) {
                        echo "Fallo consulta: " . mysqli_error($con);
                        exit();
                    }
                    $sqlc = "SELECT usuarios.id, usuarios.password , usuarios.nombre_usuario, usuarios.nombre, usuarios.genero, usuarios.mail,usuarios.biografia, rango_usuarios.rango_id FROM usuarios INNER JOIN rango_usuarios ON usuarios.id = rango_usuarios.usuario_id WHERE mail = '$mail'";
                    $resultc = mysqli_query($con, $sqlc);
                    if (!$resultc) {
                        echo "Fallo consulta: " . mysqli_error($con);
                        exit();
                    }
                    $r_assoc = mysqli_fetch_all($resultc, MYSQLI_ASSOC);
                    $contra = $_POST['password'];
                    if (password_verify($contra, $r_assoc[0]['password'])) {
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
                
                    $msj = "<div class='alert alert-success' role='alert'> Se ha registrado con éxito, por favor inicie sesión </div>";
                    $e = "esto sirve para ocultar el breadcrumb una vez se completa el registro";
                } 
                else {
                    $msj = "<div class='alert alert-danger' role='alert'>Las contraseñas no son iguales</div>";
                    $e = "esto sirve para ocultar el breadcrumb una vez se completa el registro";
                }
            } else {
                $msj = " <div class='alert alert-danger alert-dismissible fade show' role='alert'> El usuario ya existe <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                $e = "esto sirve para ocultar el breadcrumb una vez se completa el registro";
            }
        } else {
            $msj = "<div class='alert alert-danger' role='alert'> El email ya existe </div>";
            $e = "esto sirve para ocultar el breadcrumb una vez se completa el registro";
        }
    } 
    else {
        $msj = "<div class='alert alert-danger' role='alert'>El usuario y el email ya existen </div>";
        $e = "esto sirve para ocultar el breadcrumb una vez se completa el registro";
    }
}
if(isset($header)){
    $return = array("header" => $header);
} 
else{
    $return = array("header" => false, "msj" => $msj);
}

echo json_encode($return);
?>
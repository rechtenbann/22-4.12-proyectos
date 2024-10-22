<?php
require_once "includes/config.php";
$f=1;
if (isset($_POST['usu'])) {
    $f=0;
    $usuario = $_POST['usu'];
    $contrasena = md5($_POST['contra']);

    $consul = "SELECT * FROM register WHERE nombre='$usuario' and contrasena='$contrasena'";
    $resul = mysqli_query($conn, $consul);
    if (!$resul) {
        echo "Fallo consulta: " . mysqli_error($conn);
        echo ($consul);
        exit();
    }
    $filas = mysqli_num_rows($resul);

    if ($filas == 1) {
        session_start();
        if (!isset($_SESSION['usu'])) {
            session_start();
         }
        $_SESSION['usu'] = mysqli_fetch_assoc($resul);
        // probar cambiando la linea de abajo por=> header("location:home.php");
        header("location:index.php");
        
        // header("location:home.php");
    } else {
?>
        <style>
            .error {
                font-size: 16px;
                text-decoration: underline rgb(184, 20, 20);
                color: rgb(184, 20, 20);
                height: 15px;
            }
        </style>
<?php
    }

    mysqli_free_result($resul);
    mysqli_close($conn);
}
require_once "vistas/login.php";

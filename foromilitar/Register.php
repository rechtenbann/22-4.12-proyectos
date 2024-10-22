<?php
require_once "includes/config.php";


$aa = false;
$aaa = false;
$c = true;
$cc = true;
$g=true;

$_SESSION['correo'] = "";
$_SESSION['contra'] = "";
$_SESSION['confi'] = "";
if (isset($_POST['submit'])) {
  $usna = $_POST['usu'];
  $email = $_POST['correo'];
  $pass = $_POST['contra'];
  $conf = $_POST['confi'];
  $_SESSION['usu'] = $_POST['usu'];
  $_SESSION['correo'] = $_POST['correo'];
  $_SESSION['contra'] = $_POST['contra'];
$_SESSION['confi'] = $_POST['confi'];
  if (isset($_POST['usu'])) {
  $consulta = "SELECT * FROM register WHERE nombre='$usna'";
$res = mysqli_query($conn, $consulta);
if (!$res) {
  die('Error de Consulta: ' . mysqli_errno($conn));
}
if (!$res->num_rows > 0) {
$g=false;
$_SESSION['correo'] = $_POST['correo'];
$_SESSION['contra'] = $_POST['contra'];
$_SESSION['confi'] = $_POST['confi'];
$cc = false;
} 
  }

}
if (isset($_POST['contra']) && isset($_POST['confi'])) {
  if ($_POST['contra'] != $_POST['confi']) {
    $aa = false;
    $c = false;
    $_SESSION['usu'] = $_POST['usu'];
    $_SESSION['correo'] = $_POST['correo'];
    $_SESSION['contra'] = $_POST['contra'];
$_SESSION['confi'] = $_POST['confi'];
   
  } else {
    $aa = true;
  }
}
$email =  $_SESSION['correo'];
$pass =  $_SESSION['contra'] ;
$conf = $_SESSION['confi'];


if ($aa == true && $g == true) {
  if (isset($_POST['usu'])) {
    if ($pass == $conf) {
      $consulta = "SELECT * FROM register WHERE correo='$email'";
      $res = mysqli_query($conn, $consulta);
      if (!$res) {
        die('Error de Consulta: ' . mysqli_errno($conn));
      }
      if (!$res->num_rows > 0) {

        $consulta = "INSERT INTO register VALUES(null, '" . $_POST['usu'] . "', '" . md5($_POST['contra']) . "', '" . $_POST['correo'] . "', 1, 'user.png', 'Sin descripcion', '0')";
        $res = mysqli_query($conn, $consulta);
        if (!$res) {
          die('Error de Consulta: ' . mysqli_errno($conn));
        }
     
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
      } else {
?>
        <script>
          alert("el correo no existe")
        </script>
      <?php
      }
    } else {
      ?>
      <h3>Las contraseñas no coinciden.</h3>
<?php
    }
  
  }
}


require_once "vistas/register.php";
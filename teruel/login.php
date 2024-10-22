<?php
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    require_once "config.php";

    $sql = "SELECT * FROM usuarios 
            WHERE usuario = '" . $_POST['usuario'] . "'
            AND password= MD5('" . $_POST['password'] . "')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo "Fallo consulta: " . mysqli_error($con);
        exit();
    }
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['usuario'] = mysqli_fetch_assoc($result);
        header('Location: index.php');
    }else{
        $msj = "No existis";
    }
}
require_once "views/login.php";

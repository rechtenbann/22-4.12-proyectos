<?php

define('DB_SERVER','localhost');
define('DB_USUARIO','root');
define('DB_PASSWORD','');
define('DB_BASE','base_foromilitar');

$conn = mysqli_connect(DB_SERVER,DB_USUARIO,DB_PASSWORD,DB_BASE);
if(!$conn){
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}
if (!isset($_SESSION['usu'])) {
    session_start();
 }
 
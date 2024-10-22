<?php 
require_once "includes/config.php";

$continente=$_POST['id_provincia1'];

    $sql1="SELECT *
        FROM localidades
        WHERE id_privincia='$continente'";

    $result=mysqli_query($conn,$sql1);

    $cadena="
    <select class='form-select' id='loc' name='id_localidad' required>";

    while ($ver=mysqli_fetch_row($result)) {
       


       
        $cadena=$cadena.'<option value='.$ver[0].'>'.$ver[2].'</option>';
    }

    echo  $cadena."</select> ". "<label for='floatingInputGrid'>Localidad</label>";
    

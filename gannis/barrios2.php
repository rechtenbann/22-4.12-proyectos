<?php
require_once("config.php");

$barrio = $_POST['barrio'];

$sql = "SELECT id, barrio FROM barrios WHERE id='$barrio'";

$result = mysqli_query($con, $sql);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$cadena = "<select class='form-select' id='lista3' name='barrio' REQUIRED> 
           <option value='0'>Seleccione su barrio</option>";

foreach ($bar = mysqli_fetch_all($result, MYSQLI_ASSOC) as $ver) {


    $cadena = $cadena . '<option value=' . $ver['id'] . '>' . $ver['barrio'] . '</option>';
  

  /*$cadena = $cadena . '<option value=' . $ver['id'] . '>' . $ver['barrio'] . '</option>';*/
}

echo  $cadena . "</select>";
?>

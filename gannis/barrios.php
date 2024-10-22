<?php
require_once("config.php");

$provincia = $_POST['provincia'];

if (isset($_POST['barri'])) {
  $valu = $_POST['barri'];
}  else {
  $valu = 0;
}


$sql = "SELECT id, provincia_id, barrio FROM barrios WHERE provincia_id='$provincia'";

$result = mysqli_query($con, $sql);
if (!$result) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$cadena = "<select class='form-select' id='lista2' name='bar' REQUIRED> 
           <option value='0'>Seleccione su barrio</option>";

foreach ($bar = mysqli_fetch_all($result, MYSQLI_ASSOC) as $ver) {

  /* if (isset($_POST['bar'])) {
    if ($ver['id'] == $_POST['bar']) {
      $cadena = $cadena . '<option selected>' . $ver['barrio'] . '</option>';
    }
  } else {
    $cadena = $cadena . '<option value=' . $ver['id'] . '>' . $ver['barrio'] . '</option>';
  }*/

  $cadena = $cadena . '<option value=' . $ver['id'] . '>' . $ver['barrio'] . '</option>';
}

echo  $cadena . "</select>";
?>
<script type="text/javascript">
  <?php require_once('session_start.php');?>
  $(document).ready(function() {
    $('#lista2').val(<?php echo  $valu ?> );
    recargarList();

    $('#lista2').change(function() {
      recargarList();
    });

  })
</script>
<script type="text/javascript">
  function recargarList() {
    $.ajax({
      type: "POST",
      url: "barrios2.php",
      data: "barrio=" + $('#lista2').val(),
      success: function(r) {
        $('#select3lista').html(r);
      }
    });
  }
</script>
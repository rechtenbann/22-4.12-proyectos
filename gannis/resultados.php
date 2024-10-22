<?php
require_once "config.php";

//especie
//tamaño
//provincia
//barrio
//sexo


$query = "SELECT * FROM provincias";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
  echo "Fallo consulta: " . mysqli_error($con);
  exit();
}

$provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);




if (isset($_GET['especie'])) {
  if ($_GET['especie'] == 'Todo' && $_GET['provincia'] == 0 && $_GET['barrio'] == 0 && $_GET['sexo'] == 'Todo' && !isset($_GET['esp'])) {

    $sql = "SELECT * FROM mascotas";

    $result = mysqli_query($con, $sql);
    if (!$result) {
      echo "Fallo consulta: " . mysqli_error($con);
      exit();
    }

    $cant_total = mysqli_num_rows($result);

    $pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

    $desde = CANT_REG_PAG * ($pag - 1);

    $por_pag = CANT_REG_PAG;

    $sql = "SELECT * FROM mascotas LIMIT $desde,$por_pag";

    $result = mysqli_query($con, $sql);
    if (!$result) {
      echo "Fallo consulta: " . mysqli_error($con);
      exit();
    }

    $mascotas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $cant_pag = ceil($cant_total / CANT_REG_PAG);

    $res = 'especie=0&tamaño=0&provincia=0&barrio=0&sexo=0';
  } else {

    $query = "SELECT usuarios.nombre, mascotas.edad, mascotas.vacunado, mascotas.nombre, mascotas.esterlizado, mascotas.peso, mascotas.desparasitado, mascotas.nivel_de_actividad, mascotas.id, mascotas.fecha_alta, mascotas.animal, mascotas.tamano, mascotas.sexo, usuarios.provincia_id, usuarios.barrio_id 
    FROM mascotas_organizaciones 
    INNER JOIN mascotas ON mascotas_organizaciones.mascota_id = mascotas.id 
    INNER JOIN usuarios ON mascotas_organizaciones.usuario_id = usuarios.id 
    WHERE mascotas.fecha_alta IS NULL ";

    if ($_GET['especie'] != 'Todo') {
      $query .= "AND animal  = '" . $_GET['especie'] . "' ";
    }
    if ($_GET['sexo'] != 'Todo') {
      $query .= "AND sexo  = '" . $_GET['sexo'] . "' ";
    }
    if ($_GET['provincia'] != 0) {
      $query .= "AND provincia_id  = '" . $_GET['provincia'] . "' ";
    }
    if ($_GET['barrio'] != 0) {
      $query .= "AND barrio_id  = '" . $_GET['barrio'] . "' ";
    }
    if (isset($_GET['esp'])) {
      $select = '';
      //$ele = count($_GET['esp']);
      //$actual = 0;

      foreach ($_GET['esp'] as $value) {
        /*
        if ($actual != $ele - 1) {
          $select .= $value . ', ';
        } else {
          $select .= $value . '';
        }
        $actual++;
        */
        $select .= "mascotas.tamano = \"" . $value . "\" OR ";
      }


      $query .= "AND ( " . substr($select, 0, -4) . " )";
    }
    //die($query);
    //var_dump($_GET);

    $result = mysqli_query($con, $query);
    if (!$result) {
      echo "Fallo consulta: " . mysqli_error($con);
      die($query);
    }


    $cant_total = mysqli_num_rows($result);

    $pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

    $desde = CANT_REG_PAG * ($pag - 1);

    $por_pag = CANT_REG_PAG;

    $query .= " ORDER BY mascotas.id DESC LIMIT $desde,$por_pag";

    $resultado = mysqli_query($con, $query);
    if (!$resultado) {
      echo "Fallo consulta: " . mysqli_error($con);
      exit();
    }

    $mascotas = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    if (mysqli_num_rows($resultado) == 0) {
      $msj = '<h4>No se encontraron resultados</h4><br>';
    }

    $cant_pag = ceil($cant_total / CANT_REG_PAG);
    /*
    $especie = $_GET['especie'];
    $prov = $_GET['provincia'];
    $bar = $_GET['barrio'];
    $sexo = $_GET['sexo'];



    $res = 'especie=' . $especie . $tam . '&provincia=' . $prov . '&barrio=' . $bar . '&sexo=' . $sexo;
    */
    $res = http_build_query($_GET);
  }
}

$view = "resultados";
require_once "views/layout.php";

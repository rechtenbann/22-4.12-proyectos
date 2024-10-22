<?php
require_once "config.php";


$sql = "SELECT * FROM mascotas WHERE animal = 'Perro'";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$cant_total = mysqli_num_rows($result);

$pag = (isset($_GET['pag']) ? $_GET['pag'] : 1);

$desde = CANT_REG_PAG * ($pag - 1);

$por_pag = CANT_REG_PAG;

$sql = "SELECT * FROM mascotas WHERE animal = 'Perro' LIMIT $desde,$por_pag";
$result = mysqli_query($con, $sql);
if(!$result){
    echo "Fallo consulta: " . mysqli_error($con);
}

$perros = mysqli_fetch_all($result, MYSQLI_ASSOC);

$cant_pag = ceil($cant_total/CANT_REG_PAG);

$query = "SELECT * FROM provincias";
$resultado = mysqli_query($con, $query);
if (!$resultado) {
    echo "Fallo consulta: " . mysqli_error($con);
    exit();
}

$provincias = mysqli_fetch_all($resultado, MYSQLI_ASSOC);


$view = "perros";
require_once "views/layout.php";
<?php
require_once "includes/config.php";
if (isset($_GET['enviar'])){
    $busqueda=$_GET['buscar'];
    $sql = "SELECT * FROM venta_de_armas INNER JOIN paises ON  paises.id = venta_de_armas.nacioanlidad WHERE nombre OR descripcion LIKE '%$busqueda%' OR nombre= '$busqueda'";
    
    
    


    $res = mysqli_query($conn, $sql);
    
    if (!$res) {
        die('Error de Consulta: ' . mysqli_errno($conn));
    }
    
    $dou = mysqli_fetch_all($res,MYSQLI_ASSOC);

    $sql1="SELECT * FROM armas WHERE arma OR info  LIKE '%$busqueda%' OR arma='$busqueda' ";
    $res1 = mysqli_query($conn, $sql1);
    
    if (!$res1) {
        die('Error de Consulta: ' . mysqli_errno($conn));
    }
    

    $dou1 = mysqli_fetch_all($res1,MYSQLI_ASSOC);

  
}
$section = "vistas/buscador.php";
require_once "vistas/layout.php";
?>
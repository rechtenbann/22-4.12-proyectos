<link href="css/fondohome.css" rel="stylesheet">
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item text-light" aria-current="page">Armas</li>
        </ol>
    </nav>
</div>
<div class="container">
    <a type="button" class="link-light dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i> Filtros </a>&nbsp;&nbsp;
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="arms.php">Todas</a></li>
        <li><a class="dropdown-item" href="ametralladoras.php">Ametralladoras</a></li>
        <li><a class="dropdown-item" href="fus_asa.php">Fusiles de asalto</a></li>
        <li><a class="dropdown-item" href="fus_com.php">Fusiles de combate</a></li>
        <li><a class="dropdown-item" href="lanza.php">Lanzagranadas</a></li>
    </ul>
</div>

<div style="display:grid; grid-template-columns: repeat(2, 1fr); gap: 0px; margin: 70px;">
<?php foreach ($armas as $dou) {
    $dou["info"] = str_split($dou["info"], 300);
    require_once "includes/config.php";
    $py = $dou['id'];
?>
    <div class="container">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" alt="..." <?php echo 'src="img/armas/' . $dou['tipo'] . '/' . $py . '.jpg"'; ?>>
                    <h5 class="card-title"><?php echo $dou['arma'] ?></h5>
                    <p class="card-text"><?php echo $dou['info'][0] . "...." ?></p>
                    <a href="armas2.php?id=<?php echo $dou['id']; ?>&&tabla=<?php echo $dou['tipo'] ?>" class="btn btn-outline-dark">Leer mas >></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
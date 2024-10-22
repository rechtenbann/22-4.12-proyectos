<link href="css/fondohome.css" rel="stylesheet">

<div class="alert alert-light" role="alert" align="center">
    <strong>Busqueda de <?php echo $_GET['tipo']; ?><br>numero de resultados(<?php echo $num_registros ?>)</strong>
</div><br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item text-light" aria-current="page"><?php echo $_GET['tipo'] ?></li>
        </ol>
    </nav>
</div>



<?php foreach ($armas as $dou) {
    $dou["info"] = str_split($dou["info"], 300);
    require_once "includes/config.php";
    $py = $dou['id'];
?>
<div class="container">
    <div class="card-group">
        <div class="card">
            <img class="card-img-top" alt="..." <?php echo 'src="img/armas/' . $_GET['tipo'] . '/' . $py . '.jpg"'; ?>>
            <div class="card-body">
                <h5 class="card-title"><?php echo $dou['arma'] ?></h5>
                <p class="card-text"><?php echo $dou['info'][0] . "...." ?></p>
                <a href="armas2.php?id=<?php echo $dou['id']; ?>&&tabla=<?php echo $dou['tipo'] ?>" class="btn btn-outline-dark">Leer mas >></a>
            </div>
        </div>
    </div>
    </div>
    <?php } ?>
    
    <br><br><br>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="armas.php?tipo=<?php echo $_GET['tipo'] ?>&&pagina=<?php echo $_GET['pagina'] - 1; ?>">Previous</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) { ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active' : '' ?>"><a class="page-link" href="armas.php?tipo=<?php echo $_GET['tipo']?>&&pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php } ?>

                <li class="page-item <?php echo $_GET['pagina'] >= $paginas? 'disabled' : '' ?>"><a class="page-link" href="armas.php?tipo=<?php echo $_GET['tipo'] ?>&&pagina=<?php echo $_GET['pagina'] + 1; ?>">Next</a></li>
            </ul>
        </nav>
    </div>
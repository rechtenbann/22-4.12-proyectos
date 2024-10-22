<br>
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
        <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
        <li class="breadcrumb-item" aria-current="page">Conflictos</li>
    </ol>
</nav>
</div>
<?php

foreach ($dou as $pe) {
    $pe["informacion"] = str_split($pe["informacion"], 300);
    require_once "includes/config.php";
    $py= $pe['id'];
?>
    <div class="container">
        <div class="row">
            <div class="card mb-3">
            <img class="card-img-top" alt="..." <?php echo 'src="img/conflictos/conflic/'. $py . '.jpg"'; ?>>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $pe['nombre'] ?></h5>
                    <p class="card-text"><?php echo $pe['informacion'][0] . "...." ?></p>
                    <a href="conflictos.php?id=<?php echo $pe['id']; ?>" class="btn btn-outline-dark">Leer mas >></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="conflictos2.php?<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) { ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active' : '' ?>"><a class="page-link" href="conflictos2.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php } ?>

                <li class="page-item <?php echo $_GET['pagina'] >= $paginas? 'disabled' : '' ?>"><a class="page-link" href="conflictos2.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </div>
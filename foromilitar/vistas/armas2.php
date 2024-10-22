<link href="css/fondoarmas.css" rel="stylesheet">
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="arms.php" class="link-info">Armas</a></li>
            <li class="breadcrumb-item text-light"><?php echo $armas['arma']?></li>
        </ol>
    </nav>
</div>
<br>
<div class="container">
    <div class="card border-danger mb-3" style="max-width: 1200px; max-height:720px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img class="img-fluid rounded-start" alt="..." <?php require_once "includes/config.php";
                                                                $py = $armas['id'];    $py2=$py+20;
                                                                 echo 'src="img/armas/'.$armas['tipo'].'/'.$py .'.jpg"'
                                                                ?>><br>
                                                                <img class="img-fluid rounded-start" alt="..." <?php require_once "includes/config.php";
                                                                $py = $armas['id']; 
                                                                echo 'src="img/armas/'.$armas['tipo'].'/'.$py2 .'.jpg"'
                                                                ?>>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $armas['arma'] ?></h5>
                    <p class="card-text"><?php echo $armas['info'] ?></p>
                    <p class="card-text"><strong> Peso : <?php echo $armas['peso'] ?></strong></p>
                    <p class="card-text"><strong>Alcance: <?php echo $armas['alcance'] ?></strong></p>
                    <a href="arms.php?tipo=<?php echo $armas['tipo'] ?>&&pagina=1"><small class="text-muted">Volver atras</small></a>

                </div>
            </div>
        </div>
    </div>
</div>
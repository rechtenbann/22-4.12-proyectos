<link href="css/fondoformaciones.css" rel="stylesheet">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item text-light" aria-current="page"><?php echo $grupos[0]['nom_grup']?></li>
        </ol>
    </nav>
<div class="container">
    <div class="card mb-3" style="max-width: 1200px; max-height:720px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img  class="img-fluid rounded-start" style="height: 100%;" alt="..."<?php require_once "includes/config.php";
                                                                $py = $grupos[0]['id']; 
                                                                echo 'src="img/divisiones/'.$py .'.jpg"'
                                                                ?> >
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $grupos[0]['nom_grup'] ?></h5>
                    <p class="card-text"><strong><?php echo $grupos[0]['informacion'] ?></strong></p>
                    <p class="card-text">conformado por:<br><br><?php echo $grupos[0]['conformado'] ?></p>
                    <a href="index.php"><small class="text-muted">Volver al Inicio</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
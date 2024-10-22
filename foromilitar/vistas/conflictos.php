<link rel="stylesheet" href="css/fondoconflictos.css">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="conflictos2.php" class="link-info">Conflictos</a></li>
            <li class="breadcrumb-item text-light"><?php echo $dou[0]['nombre']?></li>
        </ol>
    </nav>
<div class="container">
    <div class="card mb-3" style="max-width: 1200px; max-height:720px;">
        <div class="row g-0">
            <div class="col-md-4">
            <img  class="img-fluid rounded-start" style="width: 100%; height:100%;" alt="..."<?php require_once "includes/config.php";
                                                                $py = $dou[0]['id']; 
                                                                echo 'src="img/conflictos/conflic/'.$py .'.jpg"'
                                                                ?> >
                
                
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dou[0]['nombre'] ?></h5>
                    <p class="card-text"><strong><?php echo $dou[0]['informacion'] ?></strong></p>
                    <p class="card-text"><small class="text-muted">periodo: <?php echo $dou[0]['año'] ?></small></p>
                    <a href="conflictos2.php"><small class="text-muted">Volver atras</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
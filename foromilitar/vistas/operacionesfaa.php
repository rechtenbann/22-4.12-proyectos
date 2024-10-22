<link href="css/fondooperaciones.css" rel="stylesheet">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item text-light" aria-current="page">Operaciones FFAA</li>
        </ol>
    </nav>
<div class="container">
    <div class="card mb-3" style="max-width: 1200px; max-height:720px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="img/operaciones/1.jpg"  style="height: 100%;" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Operaciones de las FFAA</h5>
                    <p class="card-text"><?php echo $dou[0]['info'] ?></p>
                    <p class="card-text"><?php echo $dou[0]['participacion'] ?></p>
                    <p class="card-text"><strong><?php echo $dou[0]['a'] ?></strong></p>
                    <p class="card-text"><strong><?php echo $dou[0]['b'] ?></strong></p>
                    <a href="index.php"><small class="text-muted">Volver atras</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
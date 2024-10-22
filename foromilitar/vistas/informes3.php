<link href="css/informes3.css" rel="stylesheet">
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="informes2.php?pagina=1" class="link-info">Informes</a></li>
            <li class="breadcrumb-item text-light"><?php echo $informes['titulo'] ?></li>
        </ol>
    </nav>
</div>
<br>
<div class="container">
    <div class="card border-danger mb-3" style="max-width: 1200px; width:1000px">
        <div class="row g-0">
            <div class="col-md-4">
                <?php
                if (file_exists('img/informes/' . $informes['id'] . '/principal2.jpg')) { ?>
                    <img class="card-img-top" style="width:100%; height:100%;" src="img/informes/<?php echo $informes['id']; ?>/principal2.jpg">
                <?php
                } ?>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                   <u><h1 class="card-title"><?php echo $informes['titulo'] ?></h1></u><br>
                    <p class="card-text">Informacion: <?php echo $informes['informacion'] ?></p>
                    <p class="card-text">Descripcion: <?php echo $informes['descripcion'] ?></p>
                    <a href="informes2.php?=1" class="btn btn-dark">Volver atras</a>
                </div>
            </div>
        </div>
    </div>
</div>
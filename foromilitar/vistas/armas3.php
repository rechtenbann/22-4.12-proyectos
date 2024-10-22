<link href="css/fondoarmas.css" rel="stylesheet">
<br>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="divisiones_lista.php?pagina=1" class="link-info">Mercado libre</a></li>
            <li class="breadcrumb-item text-light"><?php echo $armas['nombre']?></li>
        </ol>
    </nav>
</div>
<br>
<div class="container">
    <div class="card border-danger mb-3" style="max-width: 1200px; width:1000px">
        <div class="row g-0">
            <div class="col-md-4">
            <?php
              if (file_exists('img/ventas/' . $armas['id_arma'] . '/principal.jpg')) { ?>
                <img class="card-img-top"   style="width:300px; height:120px;" src="img/ventas/<?php echo $armas['id_arma']; ?>/principal.jpg">
              <?php
              } ?>
              <?php
              if (file_exists('img/ventas/' . $armas['id_arma'] . '/secundaria.jpg')) { ?>
                <img class="card-img-top"   style="width:300px; height:120px;" src="img/ventas/<?php echo $armas['id_arma']; ?>/secundaria.jpg">
              <?php
              } ?>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $armas['nombre'] ?></h5>
                    <p class="card-text"><?php echo $armas['descripcion'] ?></p>
                    <p class="card-text"><strong> Peso : <?php echo $armas['nacioanlidad'] ?></strong></p>
                    <p class="card-text"><strong>Alcance: <?php echo $armas['precio'] ?></strong></p>
                    <a href="divisiones_lista.php?pagina=1" class="btn btn-dark">Volver atras</a>
                    <a href="compras.php?id=<?php echo $armas['id_arma']?>" class="btn btn-dark">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>
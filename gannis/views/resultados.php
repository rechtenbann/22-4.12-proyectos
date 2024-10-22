<div class="container">
    <div class="cab">
        <ol class="breadcrumb">
            <li><a href="index.php">Inicio</a></li>
            <li class="b-active" aria-current="page">Resultados</li>
        </ol>
        <div class="botones-home"> <button class="btn btn-warning" data-bs-target="#filtro" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa-sharp fa-solid fa-filter"></i>  Filtro </button>
        </div>
    </div>


    <h1>Resultados</h1>


    <?php echo (isset($msj) ? $msj : '') ?>

    <?php foreach ($mascotas as $mascota) { ?>
        <div class="card mb-3  card-horizontal">
            <div class="row g-0">
                <div class="col-md-4">
                    <a href='../gannis/detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'>

                        <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
                            <img src="img/mascotas/<?php echo $mascota['id'] ?>/principal.jpg" class="foto" id="mascota">
                        <?php  } else { ?>
                            <img class="foto" id="mascota" src="img/errorImg.png">
                        <?php } ?>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="contenido">
                            <a href='../gannis/detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'">
                            <div class=" info">
                                <h3 class="nombre"><?php echo $mascota['nombre']; ?></h3>
                                <div class="infomas">
                                    <p class="text">
                                        <b>Sexo:</b> <?php echo $mascota['sexo'] ?>
                                    </p>
                                    <p class="text">
                                        <b>Edad:</b> <?php echo $mascota['edad'] ?>
                                    </p>
                                    <p class="text">
                                        <b>Peso:</b> <?php echo $mascota['peso'] ?> kg
                                    </p>
                                </div>

                        </div>
                        <div class="info">

                            <div class="infomas" id="der">
                                <p class="text">
                                    <b>Tamaño:</b> <?php echo $mascota['tamano'] ?>
                                </p>
                                <p class="text">
                                    <b>Nivel de actividad:</b> <?php echo $mascota['nivel_de_actividad'] ?>
                                </p>
                                <p class="text">
                                    <b>Vacunado:</b> <?php echo $mascota['vacunado'] ?>
                                </p>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php } ?>


<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        for ($i = 1; $i <= $cant_pag; $i++) {
            if ($i == $pag) {
                echo "<li class='page-item active' aria-current='page'>
                   <span class='page-link'>" . $i . "</span>
               </li>";
            } else {
                echo "  <li class='page-item'><a class='page-link' href='resultados.php?" . $res . "&pag=" . $i . "'>" . $i . "</a></li>";
            }
        }
        ?>
        <a class="page-link" href='' aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
</nav>

<?php require_once "filtro.php"; ?>
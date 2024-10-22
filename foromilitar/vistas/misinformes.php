<link rel="stylesheet" href="css/informes2.css">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin-top: 50px; margin-left: 60px;">
        <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
        <li class="breadcrumb-item text-light" aria-current="page"><a href="informes2.php" class="link-info">Informes</a></li>
        <li class="breadcrumb-item text-light" aria-current="page">Mis informes</li>
    </ol>
</nav>
<br>
<div class="container">
    <a href="informes2.php?pagina=1" class="btn btn-success"><i class="fa-solid fa-folder-open"></i> informes</a>&nbsp;&nbsp;
    <a href="informes.php" class="btn btn-success"><i class="fa-solid fa-folder-plus"></i> Subir Informes</a>
</div>
<div align="center">
    <br>
    <u style="color: white;">
        <h1 style="color: white;">Mis Informes</h1>
    </u>
    <br>
</div>
<?php
if (count($informes) > 0) {


?>


    <div class="new-cards">
        <div class="container">
            <div class="card-group" style="width:marign 20px" style="width: 400px;">
                <div class="row">

                    <?php foreach ($informes as $informe) {
                        $informe['informacion'] = str_split($informe['informacion'], 168);
                        $informe['descripcion'] = str_split($informe['descripcion'], 168);
                    ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <?php
                                if (file_exists('img/informes/' . $informe['id'] . '/principal2.jpg')) { ?>
                                    <img class="card-img-top" style="width:100%; height:100%;" src="img/informes/<?php echo $informe['id']; ?>/principal2.jpg">
                                <?php
                                } ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $informe['titulo'] ?></h5>

                                    <p class="card-text"><?php echo $informe['informacion']['0'] ?></p>
                                    <p class="card-text"><?php echo $informe['descripcion']['0'] ?></p>
                                    <a class="btn btn-outline-success" href="informe3.php?id=<?php echo $informe['id'];?>">Leer mas</a>
                                    <a class="btn btn-danger" href="informes_eliminar.php?id=<?php echo $informe['id'];?>">Eliminar</a>
                                    <a class="btn btn-warning" href="informes_editar.php?id=<?php echo $informe['id'];?>">Editar</a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="container">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="misinformes.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                    <?php for ($i = 0; $i < $paginas; $i++) { ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="misinformes.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                    <?php } ?>

                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="misinformes.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
                </ul>
            </nav>
        </div><?php } else if (count($informes) == 0) {

                ?> <h3 align="center">
            <i class="fa-solid fa-circle-exclamation"></i> No se encontraron resultados
        </h3>
    <?php } ?>
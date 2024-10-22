<link rel="stylesheet" href="css/informes2.css">

<?php
if (isset($_SESSION['usu'])) {
?>
    <div align="center">
        <br>
        <u style="color: white;">
            <h1 style="color: white;">Informes</h1>
        </u>
    </div>
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-info" style="text-decoration: none;">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#" class="link-light" style="text-decoration: none;">Informes</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <a type="button" class="btn btn-success dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i> Filtros </a>&nbsp;&nbsp;
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="nuevos_informes.php?pagina=1">Nuevos</a></li>
            <li><a class="dropdown-item" href="viejos_informes.php?pagina=1">Antiguos</a></li>
        </ul>
        <a href="misinformes.php?pagina=1" class="btn btn-success"><i class="fa-solid fa-folder-open"></i> Mis informes </a>&nbsp;&nbsp;
        <a href="informes.php" class="btn btn-success"><i class="fa-solid fa-folder-plus"></i> Subir Informes</a>
    </div>

    <div class="new-cards">
        <div class="container">
            <div class="card-group" style="width:marign 20px" style="width: 400rem;">
                <div class="row">

                    <?php foreach ($informes as $informe) {
                        $informe['informacion'] = str_split($informe['informacion'], 168);
                        $informe['descripcion'] = str_split($informe['descripcion'], 168);
                    ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <?php
                                if (file_exists('img/informes/' . $informe['id'] . '/principal2.jpg')) { ?>
                                    <img class="card-img-top" src="img/informes/<?php echo $informe['id']; ?>/principal2.jpg">
                                <?php
                                } ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $informe['titulo'] ?></h5>
                                    <p class="card-text">Informacion: <?php echo $informe['informacion']['0'] ?></p>
                                    <p class="card-text">Descripcion: <?php echo $informe['descripcion']['0'] ?></p>
                                    <a href="informe3.php?id=<?php echo $informe['id'] ?>" class="btn btn-outline-success">Leer mas</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    } ?>

<?php } else { ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:0;">
        si quieres agregar informes <a href="validar.php">Inicia Sesion</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div align="center">
        <br>
        <u style="color: white;">
            <h1 style="color: white;">Informes</h1>
        </u>
    </div>
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-info" style="text-decoration: none;">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#" class="link-light" style="text-decoration: none;">Informes</a></li>
            </ol>
        </nav>
    </div>
    <div class="container">

        <a class="btn btn-success dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i> Filtros </a>&nbsp;&nbsp;
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="nuevos_informes.php?pagina=1">Nuevos</a></li>
            <li><a class="dropdown-item" href="viejos_informes.php?pagina=1">Antiguos</a></li>

        </ul>
    </div>
    <div class="new-cards">
        <div class="container">
            <div class="card-group" style="width:marign 20px" style="width: 400rem;">
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

                                    <p class="card-text">Informacion: <?php echo $informe['informacion']['0'] ?></p>
                                    <p class="card-text">Descripcion: <?php echo $informe['descripcion']['0'] ?></p>
                                    <a href="informe3.php?id=<?php echo $informe['id'] ?>" class="btn btn-outline-success">Leer mas</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
                </div>
            </div>
        </div>
    </div>


    <!-- PAGINADOR -->
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="informes2.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

                <?php for ($i = 0; $i < $paginas; $i++) { ?>
                    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="informes2.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                <?php } ?>

                <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="informes2.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
            </ul>
        </nav>
    </div>
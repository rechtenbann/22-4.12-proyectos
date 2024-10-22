<?php require_once('session_start.php'); ?>

<div class="container conta">
    <ol class="breadcrumb">
        <li><a href="index.php">Inicio</a></li>
        <li class="b-active" aria-current="page">Mi perfil</li>
    </ol>
</div>

<div class="page-content page-container" id="page-content">
    <div class="padding" id="padding">
        <div class=" d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full" id="carta">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4  user-profile" id="color_bg">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <?php if (file_exists('img/usuarios/' . $usuario['id'] . '/principal.jpg')) { ?>
                                        <img class="foto" id="user_perfil" src="img/usuarios/<?php echo $usuario['id'] ?>/principal.jpg" alt="Tu foto">
                                    <?php } else { ?>
                                        <img class="foto" id="user_perfil" src="img/usuario.jpg" alt="Tu foto">
                                    <?php } ?>
                                </div>
                                <h6 class="f-w-600"><?php echo $usuario['nombre'] ?></h6>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block" id="card">
                                <div class="cabeza">
                                    <h6 id="perfil" class="f-w-600">Información</h6>
                                    <button onclick="location.href='editar_org.php?id=<?php echo $usuario['id'] ?>'" type="button" class="btn btn-warning"> Editar Perfil </button>

                                </div>

                                <div class="linea"></div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Nombre</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['nombre'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['mail'] ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Provincia</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['provincia'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Barrio</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['barrio'] ?></h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Telefono</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['telefono'] ?></h6>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-sm">
    <div class="titulocarrusel">
        <h3>Mis mascotas</h3>
        <!-- link a la pagina para ver mas perros en adopcion -->
        <a class="btn btn-primary" href="registro_mascota.php">Subir mascota</a>
    </div>
    <div class="linea"></div>
    <div class="mascotas">
        <?php foreach ($mascotas as $mascota) { ?>
            <a href='detalles_mascota.php?id=<?php echo $mascota["id"]; ?>&location=index.php'>
                <article>
                    <div class="col coll">
                        <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
                            <img class='foto' id='mascota' src="img/mascotas/<?php echo  $mascota["id"] ?>/principal.jpg">
                        <?php  } else { ?>
                            <img class='foto' id='mascota' src="img/errorImg.png">
                        <?php } ?>
                        <div class="btnmas">
                        <h3><?php echo $mascota['nombre']; ?></h3>
                        <a href='tabla_eliminar_mas.php?id=<?php echo $mascota['id'] ?>' class="btn btn-secondary" id="list"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </article>
            </a>
        <?php } ?>
    </div>
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
                    echo "  <li class='page-item'><a class='page-link' href='perfil_org.php?pag=" . $i . "'>" . $i . "</a></li>";
                }
            }
            ?>
            <a class="page-link" href='' aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>


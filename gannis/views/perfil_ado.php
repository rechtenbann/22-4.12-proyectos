<?php require_once('session_start.php'); ?>

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
                                    <button onclick="location.href='editar_ado.php?id=<?php echo $usuario['id'] ?>'" type="button" class="btn btn-warning"> Editar Perfil </button>

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
                                        <p id="par" class="m-b-10 f-w-600">Edad</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['edad'] ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p id="par" class="m-b-10 f-w-600">Cumpleaños</p>
                                        <h6 class="text-muted f-w-400"><?php echo $usuario['cumpleanios'] ?></h6>
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
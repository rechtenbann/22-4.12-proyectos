<div class="modal fade seguidos-modal" id="seguidores" tabindex="-1" aria-labelledby="seguidores" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-seguidores" >
        <div class="modal-content seguidos-modal">
            <div class="modal-header seguidos-modal">
                <h4 class="modal-title seguidos-modal" id="exampleModalLabel">Seguidores</h4>
                <button type="button" class="btn-close seguidos-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="linea"></div>
            <div class="modal-body seguidos-modal">
                <?php if ($seguidores < 1) { ?>
                    <h6>Aún no tienes seguidores.</h6>
                    <?php } else {
                    foreach ($seguidoress as $seguidor) { ?>
                        <div class="perfil-1-seguidos">
                            <div class="col-md-2 perfil-1-seguido">
                                <?php if (file_exists('img/user/' . $seguidor['id'] . '/principal.jpg')) { ?>
                                    <a href="profil2.php"><img class="foto perfil-1" id="user" src="img/user/<?php echo $seguidor['id'] ?>/principal.jpg" alt="Tu foto"></a>
                                <?php } else { ?>
                                    <a href="profil2.php"><img class="foto perfil-1" id="user" src="img/usuario.jpg" alt="Tu foto"></a>
                                <?php } ?>
                            </div>
                            <div class="col-md-4 perfil-1-nombre-seguido">
                                <b><?php echo $seguidor['nombre'] ?></b> <br>
                                <?php echo $seguidor['nombre_usuario'] ?>
                            </div>
                            <div class="col-md-6" id="perfil-1-btn-seguir">
                                <?php if (mysqli_num_rows($resultadoo) == 1) { ?>
                                    <div id="<?php echo $seguidor['id'] ?>" class="seguidor">
                                        <div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Eliminar</div>
                                    </div>
                                <?php  } else { ?>
                                    <div id="<?php echo $seguidor['id'] ?>" class="seguidor">
                                        <div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Eliminado</div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="modal-footer seguidos-modal">
                <div class="seguidores"><button type="button" class="btn btn-secondary seguidos-modal" data-bs-dismiss="modal">Cerrar</button></div>
            </div>
        </div>
    </div>
</div>

<script src="js/seguidores.js"></script>

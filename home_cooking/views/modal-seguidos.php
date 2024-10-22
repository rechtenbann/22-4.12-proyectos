<div class="modal fade seguidos-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" id="modal-seguidos">
        <div class="modal-content seguidos-modal">
            <div class="modal-header seguidos-modal">
                <h4 class="modal-title seguidos-modal" id="exampleModalLabel">Seguidos</h4>
                <button type="button" class="btn-close seguidos-modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="linea"></div>
            <div class="modal-body seguidos-modal">
                <?php if ($seguiendo < 1) { ?>
                    <h6>Aún no sigues cuentas.</h6>
                    <?php } else {
                    foreach ($seguidos as $seguido) { ?>
                        <div class="perfil-1-seguidos">
                            <div class="col-md-2 perfil-1-seguido">
                                <?php if (file_exists('img/user/' . $seguido['id'] . '/principal.jpg')) { ?>
                                    <a href="profil2.php"><img class="foto perfil-1" id="user" src="img/user/<?php echo $seguido['id'] ?>/principal.jpg" alt="Tu foto"></a>
                                <?php } else { ?>
                                    <a href="profil2.php"><img class="foto perfil-1" id="user" src="img/usuario.jpg" alt="Tu foto"></a>
                                <?php } ?>
                            </div>
                            <div class="col-md-4 perfil-1-nombre-seguido">
                                <b><?php echo $seguido['nombre'] ?></b> <br>
                                <?php echo $seguido['nombre_usuario'] ?>
                            </div>
                            <div class="col-md-6" id="perfil-1-btn-seguir">
                                <?php
                                if (mysqli_num_rows($resultadooo) == 1) { ?>
                                    <div id="<?php echo $seguido['id'] ?>" class="siguiendo"><div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Siguiendo</div></div>
                                <?php  } else { ?>
                                    <div id="<?php echo $seguido['id'] ?>" class="siguiendo"><div id="p1perfil-1" class="btn profile-edit-btn perfil-1">Seguir</div></div>
                                <?php } ?>
                            </div>
                        </div>

                <?php }
                } ?>
            </div>
            <div class="modal-footer seguidos-modal">
                <button type="button" class="btn btn-secondary seguidos-modal" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="js/seguidos.js"></script>
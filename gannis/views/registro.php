<div class="modal fade" id="registro" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header header-reg">
                <h5 class="modal-title" id="exampleModalToggleLabel">¡Registrate!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body body-reg">
                <p>¿Desea registrarse como adoptante u organización de adopción?</p>
                <div class="reg-tip">
                    <div class="card card-reg" style="width: 18rem;">
                        <img src="img/adoptcat.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <button onclick="location.href='registro_adop.php'" type="button" class="btn btn-primary">Adoptante</button>
                        </div>
                    </div>
                    <div class="card card-reg" style="width: 18rem;">
                        <img src="img/dogcorp.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <button onclick="location.href='registro_org.php'" type="button" class="btn btn-primary">Organización</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer foot-reg">
                ¿Ya tenes cuenta?
                <a href="inicio_sesion.php">Iniciar sesión</a>
            </div>
        </div>
    </div>
</div>
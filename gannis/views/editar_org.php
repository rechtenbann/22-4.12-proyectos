<?php require_once('session_start.php'); ?>

<div class="page-content page-container" id="page-content">
    <div class="padding" id="padding">
        <div class=" d-flex justify-content-center">
            <div class="col-xl-6 col-md-12" id="edit">
                <div class="card user-card-full" id="carta">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-8" id="edit">
                            <div class="card-block" id="card">
                                <div class="cabeza">
                                    <h6 id="perfil" class="f-w-600">Editar perfil</h6>
                                    <button onclick="location.href='perfil_org.php?id=<?php echo $usu ?>'" type="button" class="btn btn-warning"> Perfil </button>
                                </div>
                                <div class="linea"></div>
                                <form action="editar_org.php?id=<?php echo $usuario['id'] ?>" method="POST" enctype="multipart/form-data">
                                    <?php if (isset($msj)) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo $msj; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php }
                                    date_default_timezone_set("America/Argentina/Buenos_Aires");
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Nombre</p>
                                            <input value="<?php echo $usuario['nombre'] ?>" name="nombre_org" type="text" placeholder="Nombre de la organización" class="form-control form-control2" required>

                                        </div>
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Email</p>
                                            <input value="<?php echo $usuario['mail'] ?>" name="correo_org" type="email" placeholder="Mail de la organización" class="form-control form-control2" required>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Provincia</p>
                                            <select class="form-select" id="lista1" name="prov_org">
                                                <!--Seleccion de la provincia-->
                                                <option value='0'>Seleccione su provincia</option>
                                                <?php foreach ($provincias as $prov) { ?>
                                                    <option value='<?php echo $prov['id']; ?>'><?php echo $prov['provincia']; ?></option>
                                                <?php } ?>
                                                <?php
                                                foreach ($provincias as $prov) {
                                                    if (isset($_POST['prov_org']) || isset($_POST['provincia'])) {
                                                        if ($prov['id'] == $_POST['prov_org']) { ?>
                                                            <option selected><?php echo $prov['provincia'] ?></option>
                                                        <?php } else { ?>
                                                            <option value='<?php echo $prov['id']; ?>'><?php echo $prov['provincia']; ?></option>
                                                        <?php }
                                                    } else { ?>

                                                        <option value='<?php echo $prov['id']; ?>'><?php echo $prov['provincia']; ?></option>
                                                <?php   }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Barrio</p>
                                            <div id="select2lista"></div>
                                        </div>
                                        <input id="locura" value="<?php echo $usuario['barrio_id'] ?>">

                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Telefono</p>
                                            <input value="<?php echo $usuario['telefono'] ?>" name="celular" type="text" placeholder="Número de telefono de la organización" class="form-control form-control2"  required>

                                        </div>
                                        <div class="col-sm-6">
                                            <p id="par" class="m-b-10 f-w-600">Foto de perfil</p>
                                            <input name="img_usu" type="file" placeholder="Nueva foto de perfil" class="form-control form-control2">

                                        </div>
                                    </div>

                                    <div class="boton" id="boton">
                                        <input type="submit" class="btn btn-secondary" id="res-mas" value="Enviar">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $prov =  $usuario['provincia_id'] ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#lista1').val(<?php echo $prov ?>);
        recargarLista();

        $('#lista1').change(function() {
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "barrios.php",
            data: "provincia=" + $('#lista1').val() + '&barri=' + $('#locura').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    }
</script>
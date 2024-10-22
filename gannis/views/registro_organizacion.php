<center>
    <div class="forms">
        <div class="cabecera">
            <i class="fa-solid fa-circle-user"></i>
            <h3>Cuenta nueva</h3>
        </div>
        <?php if (isset($msj)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $msj; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <form action="guardadororg1.php" method="POST" class="formulario" enctype="multipart/form-data">
            <input value="<?php echo (isset($_POST['nombre_org']) ? $_POST['nombre_org'] : '') ?>" name="nombre_org" type="text" placeholder="Nombre de la organización" class="form-control form-control2" REQUIRED>
            <input value="<?php echo (isset($_POST['correo_org']) ? $_POST['correo_org'] : '') ?>" name="correo_org" type="email" placeholder="Mail de la organización" class="form-control form-control2" REQUIRED>
            <input value="<?php echo (isset($_POST['celular_org']) ? $_POST['celular_org'] : '') ?>" name="celular_org" type="text" placeholder="Número de telefono de la organización" class="form-control form-control2" REQUIRED>
            <div class="row" id="localidad">
                <div class="col" id="mascota">
                    <label for="">Provincia</label>
                    <select class="form-select" id="lista1" name="prov_org" REQUIRED>
                        <!--Seleccion de la provincia-->
                        <option value='0'>Seleccione su provincia</option>
                        <?php
                        if (isset($_POST['prov_org'])) {
                            $val = $_POST['prov_org'];
                        } else {
                            $val = 0;
                        }
                        foreach ($provincias as $prov) { ?>

                            <option value='<?php echo $prov['id']; ?>'><?php echo $prov['provincia']; ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
                <div class="col" id="mascota">
                    <label for="">Barrio</label>
                    <div id="select2lista"></div>
                </div>
                <input id="locura" value="<?php echo (isset($_POST['bar']) ? $_POST['bar'] : '') ?>">
            </div>
            <div class="row">
                <div class="col" id="mascota">
                    <input value="<?php echo (isset($_POST['contrasenaA']) ? $_POST['contrasenaA'] : '') ?>" class="form-control form-control2" type="password" name="contrasenaA" placeholder="Contraseña" minlength="8" REQUIRED>

                </div>
                <div class="col" id="mascota">
                    <input value="" class="form-control form-control2" type="password" name="contrasena_ado" placeholder="Confimar contraseña" REQUIRED>
                </div>
            </div>
            <input class="form-check-input" type="checkbox" name="politica_priv" id="politica_priv" REQUIRED>
            <label class="form-check-label" for="politica_priv">
                He leído y acepto la <a href="politica_privacidad.php" class="poli" Target="_blank">política de privacidad</a>
            </label>
            <br>
            <input class="btn btn-secondary bo" type="submit" value="¡Listo!">
        </form>
    </div>
</center>
<script type="text/javascript">
    $(document).ready(function() {
        $('#lista1').val(<?php echo $val; ?>);
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
            data: "provincia=" + $('#lista1').val()+'&barri='+$('#locura').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    }
</script>
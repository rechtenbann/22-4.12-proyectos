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
        <?php }
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        ?>
        <form action="guardadorado1.php" method="POST" class="formulario" enctype="multipart/form-data">
            <input value="<?php echo (isset($_POST['nombre_ado']) ? $_POST['nombre_ado'] : '') ?>" name="nombre_ado" type="text" class="form-control form-control2" placeholder="Nombre y apellido del adoptante" REQUIRED>
            <input value="<?php echo (isset($_POST['correo_ado']) ? $_POST['correo_ado'] : '') ?>" name="correo_ado" type="email" class="form-control form-control2" placeholder="Email" REQUIRED>
            <input value="<?php echo (isset($_POST['telefono_ado']) ? $_POST['telefono_ado'] : '') ?>" name="telefono_ado" type="text" class="form-control form-control2" placeholder="Telefono" REQUIRED>
            <input value="" id="edad" name="edad_ado" type="text" class="form-control form-control2" placeholder="Edad" hidden REQUIRED>
            <input value="<?php echo (isset($_POST['cumpleanios_ado']) ? $_POST['cumpleanios_ado'] : '') ?>" id="fecha" name="cumpleanios_ado" type="date" class="form-control form-control2" max="<?php echo (date("Y") - 16) ?>-12-31" REQUIRED>
            <div class="row" id="localidad">
                <div class="col" id="mascota">
                    <label for="">Provincia</label>
                    <select class="form-select" id="lista1" name="prov_ado" REQUIRED>
                        <!--Seleccion de la provincia-->
                        <option value="0">Seleccione su provincia</option>
                        <?php
                        if (isset($_POST['prov_ado'])) {
                            $val = $_POST['prov_ado'];
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


    $(document).ready(function() {
        $('#fecha').change(function() {
            var fecha = document.querySelector('[name="cumpleanios_ado"]').value;
            var edad = document.getElementById('edad');
            var dataen = "fecha=" + fecha;
            $.ajax({
                type: "POST",
                url: "calc_edad.php",
                data: dataen,
                success: function(resp) {
                    $('#edad').val(resp)
                }
            });
            return false;
        });
    });
</script>
<br>
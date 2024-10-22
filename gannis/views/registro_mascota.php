<center>
    <br>
    <br>
    <ol class="breadcrumb">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="perfil_org.php">Mi perfil</a></li>
        <li class="b-active" aria-current="page">Registro mascota</li>
    </ol>
    <div class="form-mas" id="regis-mas">
        <form action="guardadormas1.php" method="POST" enctype="multipart/form-data" id="mascotas">
            <div class="cabecera">
                <i class="fa-solid fa-paw" id="r-mas"></i>
                <h3 id="reg-m">Registro de mascota</h3>
                <?php echo (isset($msj) ? $msj : ''); ?>
            </div>
            <?php echo (isset($msj) ? $msj : ''); ?>
            <div class="text-mas">
                <div class="alert alert-primary" role="alert">
                    Se informa que todos los campos son obligatorios
                </div>
                <div class="row">
                    <div class="col" >
                        <label for="formFileMultiple" class="form-label">Foto principal</label>
                        <input type="file" name="principal" id="formFileMultiple" multiple value="" class="form-control form-control2" required oninvalid="this.setCustomValidity('Ingrese la foto principal')" oninput="this.setCustomValidity('')">
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo (isset($_POST['nombre']) ? $_POST['nombre'] : '') ?>" class="form-control" form-control2 required oninvalid="this.setCustomValidity('Ingrese el nombre de la mascota')" oninput="this.setCustomValidity('')">
                    </div>
                    <?php if (!empty($statusMsg)) { ?>
                        <p class="status-msg"><?php echo $statusMsg; ?>
                        <p>
                        <?php } ?>
                        <div class="col" >
                            <label for="formFileMultiple" class="form-label">Fotos</label>
                            <input type="file" name="img[]" id="formFileMultiple" multiple value="<?php echo (isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : '') ?>" class="form-control form-control2" required oninvalid="this.setCustomValidity('Ingrese la o las fotos secundarias de la mascota')" oninput="this.setCustomValidity('')">
                        </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">Edad</label>
                        <select id="select" name="edad" class="form-select" aria-label="Default select example" required>
                            <?php $edades = ['1 semana', '2 semana', '3 semana', '1 mes', '2 meses', '3 meses', '4 meses', '5 meses', '6 meses', '7 meses', '8 meses', '9 meses', '10 meses', '11 meses', '1 año', '2 años', '3 años', '4 años', '5 años', '6 años', '7 años', '8 años', '9 años', '10 años', '11 años', '12 años', '13 años', '14 años', '15 años', '16 años', '17 años', '18 años', '19 años', '20 años'];
                            foreach ($edades as $edad) {
                                if ($edad == $_POST['edad']) { ?>
                                    <option selected><?php echo $edad ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $edad ?>"><?php echo $edad ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">Tamaño</label>
                        <select id="select" name="tamaño" class="form-select" aria-label="Default select example" required>
                            <?php $tamano = ['Chico', 'Mediano', 'Grande'];
                            foreach ($tamano as $tam) {
                                if ($tam == $_POST['tamaño']) { ?>
                                    <option selected><?php echo $tam ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $tam ?>"><?php echo $tam ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">Peso</label>
                        <input type="number" value="<?php echo (isset($_POST['peso']) ? $_POST['peso'] : '') ?>" name="peso" min="0" max="85" step="0.1" class="form-control" required oninvalid="this.setCustomValidity('Ingrese el peso de la mascota')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">Nivel de actividad</label>
                        <select id="select" name="actividad" class="form-select" aria-label="Default select example" required>
                            <?php $actividad = ['Activo', 'Moderado', 'Sedentario'];
                            foreach ($actividad as $act) {
                                if ($act == $_POST['actividad']) { ?>
                                    <option selected><?php echo $act ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $act ?>"><?php echo $act ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="row" id="radio-btn">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">¿Está vacunado?</label>
                        <div class="d-flex" id="r-d">
                            <div class="form-check" id="izq">
                                <input class="form-check-input" <?php if (isset($_POST['vacunado'])) {
                                                                    echo ($_POST['vacunado'] == 'Sí' ? 'checked' : '');
                                                                } ?> type="radio" name="vacunado" id="flexRadioDefault1" value="Sí" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?php if (isset($_POST['vacunado'])) {
                                                                    echo ($_POST['vacunado'] == 'No' ? 'checked' : '');
                                                                } ?> type="radio" name="vacunado" id="flexRadioDefault2" value="No" required>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">¿Cuál es su especie?</label>
                        <div class="d-flex" id="r-d">
                            <div class="form-check" id="izqqq">
                                <input class="form-check-input" <?php if (isset($_POST['especie'])) {
                                                                    echo ($_POST['especie'] == 'Gato' ? 'checked' : '');
                                                                } ?> type="radio" name="especie" value="Gato" required oninvalid="this.setCustomValidity('Ingrese la especie de la mascota')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Gato
                                </label>
                            </div>
                            <div class="form-check" id="derrr">
                                <input class="form-check-input" <?php if (isset($_POST['especie'])) {
                                                                    echo ($_POST['especie'] == 'Perro' ? 'checked' : '');
                                                                } ?> type="radio" name="especie" id="flexRadioDefault2" value="Perro" required oninvalid="this.setCustomValidity('Ingrese la especie de la mascota')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perro
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row" id="radio-btn">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">¿Está esterilizado?</label>
                        <div class="d-flex" id="r-d">
                            <div class="form-check" id="izq">
                                <input class="form-check-input" <?php if (isset($_POST['esteril'])) {
                                                                    echo ($_POST['esteril'] == 'Sí' ? 'checked' : '');

                                                                } ?> type="radio" name="esteril" id="flexRadioDefault1" value="Sí" required oninvalid="this.setCustomValidity('Ingrese si la mascota es esteril')" oninput="this.setCustomValidity('')">

                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?php if (isset($_POST['esteril'])) {
                                                                    echo ($_POST['esteril'] == 'No' ? 'checked' : '');
                                                                } ?> type="radio" name="esteril" id="flexRadioDefault2" value="No" required oninvalid="this.setCustomValidity('Ingrese si la mascota es esteril')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">¿Cuál es su sexo?</label>
                        <div class="d-flex" id="r-d">
                            <div class="form-check" id="izqq">
                                <input class="form-check-input" <?php if (isset($_POST['sexo'])) {
                                                                    echo ($_POST['sexo'] == 'Hembra' ? 'checked' : '');
                                                                } ?> type="radio" name="sexo" id="flexRadioDefault1" value="Hembra" required oninvalid="this.setCustomValidity('Ingrese el sexo de la mascota')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hembra
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?php if (isset($_POST['sexo'])) {
                                                                    echo ($_POST['sexo'] == 'Macho' ? 'checked' : '');
                                                                } ?> type="radio" name="sexo" id="flexRadioDefault2" value="Macho" required oninvalid="this.setCustomValidity('Ingrese el sexo de la mascota')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Macho
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row " id="radio-btn">
                    <div class="col" >
                        <label for="formGroupCategoria" class="form-label">¿Está desparasitado?</label>
                        <div class="d-flex" id="r-d">
                            <div class="form-check" id="izq">
                                <input class="form-check-input" <?php if (isset($_POST['desparasitado'])) {
                                                                    echo ($_POST['desparasitado'] == 'Sí' ? 'checked' : '');
                                                                } ?> type="radio" name="desparasitado" id="flexRadioDefault1" value="Sí" required oninvalid="this.setCustomValidity('Ingrese si la mascota esta desparasitada')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" <?php if (isset($_POST['desparasitado'])) {
                                                                    echo ($_POST['desparasitado'] == 'No' ? 'checked' : '');
                                                                } ?> type="radio" name="desparasitado" id="flexRadioDefault2" value="No" required oninvalid="this.setCustomValidity('Ingrese si la mascota esta desparasitada')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col" >

                    </div>
                </div>

                <div class="textareas">
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Especificaciones</label>
                        <textarea name="especificaciones" placeholder="Detallar sobre el color, extremidades o partes faltantes, enfermedades u otros." class="form-control form-control2" rows="3" required oninvalid="this.setCustomValidity('Ingrese las especificaciones de la mascota')" oninput="this.setCustomValidity('')"><?php echo (isset($_POST['especificaciones']) ? $_POST['especificaciones'] : '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Necesidades</label>
                        <textarea name="necesidades" placeholder="Aquí debería especificar los caprichos o necesidades específicas de la mascota." class="form-control form-control2" rows="3" required oninvalid="this.setCustomValidity('Ingrese las necesidades de la mascota')" oninput="this.setCustomValidity('')"><?php echo (isset($_POST['necesidades']) ? $_POST['necesidades'] : '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Requerimientos</label>
                        <textarea name="requerimientos" placeholder="Medicamentos, comida o nutrientes específicos." class="form-control form-control2" rows="3" required oninvalid="this.setCustomValidity('Ingrese los requerimientos de la mascota')" oninput="this.setCustomValidity('')"><?php echo (isset($_POST['requerimientos']) ? $_POST['requerimientos'] : '') ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="textarea" class="form-label">Historia</label>
                        <textarea name="historia" placeholder="De donde viene la mascota, si se la encontró en la calle, es cría directa de otras mascotas, etc." class="form-control form-control2" rows="3" required oninvalid="this.setCustomValidity('Ingrese la historia de la mascota')" oninput="this.setCustomValidity('')"><?php echo (isset($_POST['historia']) ? $_POST['historia'] : '') ?></textarea>
                    </div>
                </div>

            </div>

            <input class="form-check-input" type="checkbox" name="politica_priv" id="politica_priv" required>
            <label class="form-check-label" for="politica_priv">
                He leído y acepto la <a href="politica_privacidad.php" class="poli" Target="_blank">política de privacidad</a>
            </label>
            <div class="boton">
                <input type="submit" class="btn btn-secondary" id="res-mas" value="Enviar">
            </div>
        </form>
    </div>
    <script>
        function neces() {
            alert("Aqui deberia especificar los caprichos o necesidades especificas de la mascota");
        }

        function espec() {
            alert("Detallamiento de colores, extremidades o partes faltantes, enfermedades u otros");
        }

        function histo() {
            alert("De donde viene la mascota, si se la encontro en la calle, es cria directa de otras mascotas, etc");
        }

        function reque() {
            alert("Medicamentos, comida o nutrientes especificos");
        }
    </script>
</center>
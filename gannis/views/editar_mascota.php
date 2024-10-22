<center>
  <div class="form-mas" id="regis-mas">
    <form action="editar_mascota.php" method="POST" enctype="multipart/form-data" id="mascotas">
      <div class="cabecera">
        <i class="fa-solid fa-paw" id="r-mas"></i>
        <h3 id="reg-m">Editar mascota</h3>
        <?php echo (isset($msj) ? $msj : ''); ?>
      </div>
      <?php echo (isset($msj) ? $msj : ''); ?>
      <div class="text-mas">
        <div class="row">
          <div class="linea"></div>
          <form action="editar_mascota.php?id=<?php echo $mascota['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="col" id="mascota">
              <input type="hidden" value="<?php echo $mascota['id'] ?> " name="ids">

              <label id=" mascotas-form" for="formGroupCategoria" class="form-label">Nombre</label>
              <input type="text" name="enombre" value="<?php echo $mascota['nombre']  ?>" class="form-control" form-control2 REQUIRED>
            </div>
            <?php if (!empty($statusMsg)) { ?>
              <p class="status-msg"><?php echo $statusMsg; ?>
              <p>
              <?php } ?>
              <div class="col" id="mascota">
                <label for="formFileMultiple" class="form-label">Fotos</label>
                <input type="file" name="img[]" id="formFileMultiple" multiple value="<?php echo (isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : '') ?>" class="form-control form-control2">
              </div>
        </div>
        <div class="row">
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">Edad</label>
            <select id="select" name="eedad" class="form-select" aria-label="Default select example" REQUIRED>
              <?php $edades = ['1 semana', '2 semana', '3 semana', '1 mes', '2 meses', '3 meses', '4 meses', '5 meses', '6 meses', '7 meses', '8 meses', '9 meses', '10 meses', '11 meses', '1 año', '2 años', '3 años', '4 años', '5 años', '6 años', '7 años', '8 años', '9 años', '10 años', '11 años', '12 años', '13 años', '14 años', '15 años', '16 años', '17 años', '18 años', '19 años', '20 años']; ?>
              <<option selected><?php echo $mascota['edad'] ?></option>
                <?php foreach ($edades as $edad) { ?>
                  <option value="<?php echo $edad ?>"><?php echo $edad ?></option>
                <?php } ?>
            </select>
          </div>
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">Tamaño</label>
            <select id="select" name="etamaño" class="form-select" aria-label="Default select example" REQUIRED>
              <?php $tamano = ['Chico', 'Mediano', 'Grande']; ?>
              <option selected><?php echo $mascota['tamano'] ?></option>
              <?php foreach ($tamano as $tam) { ?>
                <option value="<?php echo $tam ?>"><?php echo $tam ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">Peso</label>
            <input type="number" value="<?php echo $mascota['peso'] ?>" name="epeso" min="0" max="85" step="0.1" class="form-control" REQUIRED>
          </div>
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">Nivel de actividad</label>
            <select id="select" name="eactividad" class="form-select" aria-label="Default select example" REQUIRED>
              <?php $actividad = ['Activo', 'Moderado', 'Sedentario']; ?>
              <option selected><?php echo $mascota['nivel_de_actividad'] ?></option>
              <?php foreach ($actividad as $act) { ?>
                <option value="<?php echo $act ?>"><?php echo $act ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="row" id="radio-btn">
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">¿Está vacunado?</label>
            <div class="d-flex" id="r-d">
              <div class="form-check" id="izq">
                <input class="form-check-input" <?php if ($mascota['vacunado'] == 'Sí' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="evacunado" id="flexRadioDefault1" value="Sí" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault1">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" <?php if ($mascota['vacunado'] == 'No' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="evacunado" id="flexRadioDefault2" value="No" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">¿Cuál es su especie?</label>
            <div class="d-flex" id="r-d">
              <div class="form-check" id="izqqq">
                <input class="form-check-input" <?php if ($mascota['animal'] == 'Gato' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="eespecie" value="Gato" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault1">
                  Gato
                </label>
              </div>
              <div class="form-check" id="derrr">
                <input class="form-check-input" <?php if ($mascota['animal'] == 'Perro' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="eespecie" id="flexRadioDefault2" value="Perro" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault2">
                  Perro
                </label>
              </div>
            </div>
          </div>

        </div>
        <div class="row" id="radio-btn">
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">¿Está esterilizado?</label>
            <div class="d-flex" id="r-d">
              <div class="form-check" id="izq">
                <input class="form-check-input" <?php if ($mascota['esterlizado'] == 'Sí' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="eesteril" id="flexRadioDefault1" value="Sí" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault1">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" <?php if ($mascota['esterlizado'] == 'No' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="eesteril" id="flexRadioDefault2" value="No" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">¿Cuál es su sexo?</label>
            <div class="d-flex" id="r-d">
              <div class="form-check" id="izqq">
                <input class="form-check-input" <?php if ($mascota['sexo'] == 'Hembra' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="esexo" id="flexRadioDefault1" value="Hembra" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault1">
                  Hembra
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" <?php if ($mascota['sexo'] == 'Macho' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="esexo" id="flexRadioDefault2" value="Macho" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault2">
                  Macho
                </label>
              </div>
            </div>
          </div>

        </div>
        <div class="row " id="radio-btn">
          <div class="col" id="mascota">
            <label id="mascotas-form" for="formGroupCategoria" class="form-label">¿Está desparasitado?</label>
            <div class="d-flex" id="r-d">
              <div class="form-check" id="izq">
                <input class="form-check-input" <?php if ($mascota['desparasitado'] == 'Sí' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="edesparasitado" id="flexRadioDefault1" value="Sí" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault1">
                  Sí
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" <?php if ($mascota['desparasitado'] == 'No' ) {
                                                  echo 'checked';
                                                } ?> type="radio" name="edesparasitado" id="flexRadioDefault2" value="No" REQUIRED>
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          <div class="col" id="mascota">

          </div>
        </div>

        <div class="textareas">
          <div class="mb-3">
            <label id="mascotas-form" for="textarea" class="form-label">Especificaciones</label>
            <textarea name="eespecificaciones" placeholder="Detallar sobre el color, extremidades o partes faltantes, enfermedades u otros." class="form-control form-control2" id="textarea" rows="3" REQUIRED><?php echo $mascota['especificaciones'] ?></textarea>
          </div>
          <div class="mb-3">
            <label id="mascotas-form" for="textarea" class="form-label">Necesidades</label>
            <textarea name="enecesidades" placeholder="Aquí debería especificar los caprichos o necesidades específicas de la mascota." class="form-control form-control2" id="textarea" rows="3" REQUIRED><?php echo $mascota['necesidades'] ?></textarea>
          </div>
          <div class="mb-3">
            <label id="mascotas-form" for="textarea" class="form-label">Requerimientos</label>
            <textarea name="erequerimientos" placeholder="Medicamentos, comida o nutrientes específicos." class="form-control form-control2" id="textarea" rows="3" REQUIRED><?php echo $mascota['requisitos'] ?></textarea>
          </div>
          <div class="mb-3">
            <label id="mascotas-form" for="textarea" class="form-label">Historia</label>
            <textarea name="ehistoria" placeholder="De donde viene la mascota, si se la encontró en la calle, es cría directa de otras mascotas, etc." class="form-control form-control2" id="textarea" rows="3" REQUIRED><?php echo $mascota['historia'] ?></textarea>
          </div>
        </div>

      </div>

      <div class="boton">
        <input type="submit" class="btn btn-secondary" id="res-mas" value="modificar">
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
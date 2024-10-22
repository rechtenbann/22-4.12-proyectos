<div class="modal fade" id="filtro" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Ajustar Busqueda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="resultados.php" method="GET">
        <div class="modal-body">
          <div class="row">
            <div class="col" >
              <label  for="formGroupCategoria" class="form-label">Especie</label>
              <select id="select" name="especie" class="form-select" aria-label="Default select example" REQUIRED>
                <?php $especies = ['Todo', 'Gato', 'Perro'];
                foreach ($especies as $especie) {
                  if ($especie == $_GET['especie']) { ?>
                    <option selected><?php echo $especie ?></option>
                  <?php  } else { ?>
                    <option value="<?php echo $especie ?>"><?php echo $especie ?></option>

                <?php }
                } ?>
              </select>
            </div>
            <div class="col" >
              <label  for="formGroupCategoria" class="form-label">Tamaño</label>
              <div class="col" >
                <div class="dropdown">
                  <a type="button" id="filr" data-bs-toggle="dropdown" class="form-select" aria-expanded="false">Elegir</a>
                  <ul class="dropdown-menu" aria-labelledby="filr" id="fil">

                    <li>
                      <div class="form-check" id="flt">
                        <input class="form-check-input" type="checkbox" name="esp[c]" value="Chico" id="filtroo" <?php echo (isset($_GET['esp']['c'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="filtroo">
                          Chico
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="form-check" id="flt">
                        <input class="form-check-input" type="checkbox" name="esp[m]" value="Mediano" id="filtroo" <?php echo (isset($_GET['esp']['m'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="filtroo">
                          Mediano
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="form-check" id="flt">
                        <input class="form-check-input" type="checkbox" name="esp[g]" value="Grande" id="filtroo" <?php echo (isset($_GET['esp']['g'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="filtroo">
                          Grande
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row" id="localidad">
            <div class="col" >
              <label  class="form-label" for="">Provincia</label>
              <select class="form-select" id="lista1" name="provincia" REQUIRED>

                <option value="0">Todo</option>
                <?php
                if (isset($_GET['provincia'])) {
                  $val = $_GET['provincia'];
                } else {
                  $val = 0;
                }
                foreach ($provincias as $prov) { ?>
                  <option value='<?php echo $prov['id']; ?>'><?php echo $prov['provincia']; ?></option>
                <?php } ?>

              </select>
            </div>
            <div class="col" >
              <label  class="form-label" for="">Barrio</label>
              <div id="select2lista"></div>
            </div>
            <input id="locura" value="<?php echo (isset($_GET['barrio']) ? $_GET['barrio'] : '') ?>">
          </div>

          <div class="row">
            <div class="col" >
              <label  for="formGroupCategoria" class="form-label">Sexo</label>
              <select id="select" name="sexo" class="form-select" aria-label="Default select example" REQUIRED>
                <?php $sexo = ['Todo', 'Hembra', 'Macho'];
                foreach ($sexo as $sexo) {
                  if ($sexo == $_GET['sexo']) { ?>
                    <option selected><?php echo $sexo ?></option>
                  <?php  } else { ?>
                    <option value="<?php echo $sexo ?>"><?php echo $sexo ?></option>

                <?php }
                } ?>

              </select>
            </div>
            <div class="col" >
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-secondary" value="Buscar">
        </div>
      </form>
    </div>
  </div>
</div>
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
      url: "barrios_filtro.php",
      data: "provincia=" + $('#lista1').val() + '&barri=' + $('#locura').val(),
      success: function(r) {
        $('#select2lista').html(r);
      }
    });
  }
</script>
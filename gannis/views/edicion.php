<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
      </div>
      <div class="modal-body">
      <p id="infofo">Esta seguro de editar a <b><?php echo $mascotas['nombre'] ?></b> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"><a href='editar_mascota.php?id=<?php echo $mascotas['id'] ?>'>Continuar</button>
      </div>
    </div>
  </div>
</div>
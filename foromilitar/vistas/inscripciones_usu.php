<?php if ($_SESSION['usu']['rol'] == 2) { ?>
  <br>
  <div class="container">
    <table class="table table-dark table-striped">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>edad</th>
        <th>genero</th>
        <th>telefono</th>
        <th>Opciones</th>
      </tr>
      <?php foreach ($usu as $usuarios) { ?>
        <tr>
          <th><?php echo $usuarios['nombre']; ?></th>
          <th><?php echo $usuarios['apellido']; ?></th>
          <th><?php echo $usuarios['edad']; ?></th>
          <th><?php echo $usuarios['genero'];?></th>
          <th><?php echo $usuarios['telefono']; ?></th>
          <th><a class="btn btn-dark">Leer mas</a></th>
        </tr>
      <?php } ?>
    </table>
  </div>
<?php } ?>
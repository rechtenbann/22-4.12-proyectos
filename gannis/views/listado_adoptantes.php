<br>
<br>
<br>

<div class="list" id="listados">

  <ol class="breadcrumb">
    <li><a href="index.php">Inicio</a></li>
    <li class="b-active" aria-current="page">Listado Adoptantes</li>
  </ol>

  <p>
  <h2> Listado de adoptantes </h2>
  </p>
  <table class="table table-striped table-hover">
    <thead class="head">
      <tr>
        <th> Nombre </th>
        <th> Email </th>
        <th> Provincia </th>
        <th> Barrio </th>
        <th> Eliminar </th>
        <th> Editar </th>
        <th> Ver perfil</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($adoptantes as $adoptante) {
        $location = localidad($adoptante['barrio_id'], $adoptante['provincia_id']);
      ?>

        <tr id="list">
          <td>
            <div class="con"><?php echo $adoptante['nombre'] ?> </div>
          </td>
          <td>
            <div class="con"><?php echo $adoptante['mail'] ?></div>
          </td>
          <td>
            <div class="con"><?php echo $location[0] ?></div>
          </td>
          <td>
            <div class="con"><?php echo $location[1] ?></div>
          </td>
          <td> <a href='tabla_eliminar_usu.php?id=<?php echo $adoptante['id'] ?>' class="btn btn-secondary" id="list"> <i class="fas fa-trash-alt"></i></a> </td>
          <td> <a href='editar_ado.php?id=<?php echo $adoptante['id'] ?>' class="btn btn-secondary" id="list"><i class="fas fa-edit"></i></a></td>
          <td><a href='perfil_ado.php?id=<?php echo $adoptante["id"]; ?>' class="btn btn-secondary" id="list"><i class="fas fa-search-plus"></i></a></td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php
      for ($i = 1; $i <= $cant_pag; $i++) {
        if ($i == $pag) {
          echo "<li class='page-item active' aria-current='page'>
                   <span class='page-link'>" . $i . "</span>
               </li>";
        } else {
          echo "  <li class='page-item'><a class='page-link' href='listado_adoptantes.php?pag=" . $i . "'>" . $i . "</a></li>";
        }
      }
      ?>
      <a class="page-link" href='' aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      </li>
    </ul>
  </nav>
</div>
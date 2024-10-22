<br>
<br>
<br>



<div class="list" id="listados">

  <ol class="breadcrumb">
    <li><a href="index.php">Inicio</a></li>
    <li class="b-active" aria-current="page">Listado Mascotas</li>
  </ol>

  <p>
  <h2>Listado de mascotas</h2><br></p>

  <table class="table table-striped table-hover">
    <thead class="head">
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Nombre</th>
        <th scope="col"> Sexo </th>
        <th scope="col"> Especie</th>
        <th scope="col"> Editar </th>
        <th scope="col"> Ver más </th>
        <th scope="col"> Eliminar </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mascotas as $mascota) { ?>
        <tr id="list">
          <td>

            <?php if (file_exists('img/mascotas/' . $mascota["id"] . '/principal.jpg')) { ?>
              <img id='list' height='220px' src="img/mascotas/<?php echo  $mascota["id"] ?>/principal.jpg">
            <?php  } else { ?>
              <img id='list' height='220px' src="img/errorImg.png">
            <?php } ?>

          <td>
            <div class="con"> <?php echo $mascota['nombre'] ?></div>
          </td>
          <td> <?php echo $mascota['sexo']  ?> </td>
          <td> <?php echo $mascota['animal'] ?> </td>
          <td> <a href='editar_mascota.php?id=<?php echo $mascota['id'] ?>' class="btn btn-secondary" id="list"><i class="fas fa-edit"></i></a></td>
          <td><a href='detalles_mascota.php?id=<?php echo $mascota["id"]; ?>' class="btn btn-secondary" id="list"><i class="fas fa-search-plus"></i></a></td>
          <td> <a href='tabla_eliminar_mas.php?id=<?php echo $mascota['id'] ?>' class="btn btn-secondary" id="list"><i class="fas fa-trash-alt"></i></a></td>

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
          echo "  <li class='page-item'><a class='page-link' href='listado_mascota.php?pag=" . $i . "'>" . $i . "</a></li>";
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
</div>
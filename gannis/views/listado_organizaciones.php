<br>
<br>
<br>


<div class="list" id="listados">

  <ol class="breadcrumb">
    <li><a href="index.php">Inicio</a></li>
    <li class="b-active" aria-current="page">Listado Organizaciones</li>
  </ol>

  <p>
  <h2> Listado de organizaciones </h2>
  </p>
  <table class="table table-striped table-hover">
    <thead class="head">
      <tr>
        <th scope="col"> Nombre </th>
        <th scope="col"> Email </th>
        <th scope="col"> Telefono </th>
        <th scope="col"> Provincia </th>
        <th scope="col"> Barrio </th>
        <th scope="col"> Eliminar </th>
        <th scope="col">Editar </th>
        <th scope="col"> Ver perfil</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($organizaciones as $organizacion) {
        $location = localidad($organizacion['barrio_id'], $organizacion['provincia_id']);
      ?>
        <tr id="list">
          <td>
            <div class="con"><a class="lista-a-o" href="perfil_org.php?id=<?php echo $organizacion['id'] ?>"><?php echo $organizacion['nombre']; ?> </a> </div>
          </td>
          <td>
            <div class="con"><a class="lista-a-o" href="perfil_org.php?id=<?php echo $organizacion['id'] ?>"> <?php echo $organizacion['mail'] ?> </a></div>
          </td>
          <td>
            <div class="con"><a class="lista-a-o" href="perfil_org.php?id=<?php echo $organizacion['id'] ?>"> <?php echo $organizacion['telefono'] ?> </a></div>
          </td>
          <td>
            <div class="con"><a class="lista-a-o" href="perfil_org.php?id=<?php echo $organizacion['id'] ?>"> <?php echo $location[0] ?> </a></div>
          </td>
          <td>
            <div class="con"><a class="lista-a-o" href="perfil_org.php?id=<?php echo $organizacion['id'] ?>"><?php echo $location[1] ?> </a> </div>
          </td>
          <td> <a href='tabla_eliminar_org.php?id=<?php echo $organizacion['id'] ?>' class="btn btn-secondary" id="list"> <i class="fas fa-trash-alt"></i> </a> </td>
          <td> <a href='editar_org.php?id=<?php echo $organizacion['id'] ?>' class="btn btn-secondary" id="list"><i class="fas fa-edit"></i></a></td>
          <td><a href='perfil_org.php?id=<?php echo $organizacion["id"]; ?>' class="btn btn-secondary" id="list"><i class="fas fa-search-plus"></i></a></td>
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
          echo "  <li class='page-item'><a class='page-link' href='listado_organizaciones.php?pag=" . $i . "'>" . $i . "</a></li>";
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
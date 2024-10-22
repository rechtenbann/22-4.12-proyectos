<div class="container marketing">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <?php
      breadcrumb("Tabla de recetas", "tabla_recetas.php");

      for ($i = 0; $i < count($bread); $i++) {
        if ($i == array_key_last($bread)) {
      ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                } else {
                                                                                                  ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                            }
                                                                                                                                                                                                          } ?>
    </ol>
  </nav>
  <section class="table-section">
    <div class="titulocarrusel">
      <h3 class="h1_categoria">Tabla de recetas:</h3>
    </div>
    <br>
    <table>
      <thead>
        <tr>
          <th> Foto </th>
          <th> Comida </th>
          <th> País</th>
          <th> Fecha alta</th>
          <th> Interacciones</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($recetas as $receta) { ?>
          <tr class="tabla-recetas">

            <?php if (file_exists('img/recetas/' .  $receta['id'] . '/principal.jpg')) {  ?>
              <td> <?php echo "<img id='list' height='220px' src='img/recetas/" . $receta['id'] . "/principal.jpg'>" ?></td>
            <?php } else { ?>
              <td><?php echo "<img id='list' height='220px' src='img/error.png'>" ?></td>

            <?php } ?>

            <td>
              <div class="con"><?php echo $receta['nombre'] ?></div>
            </td>
            <td><?php echo $receta['pais'] ?></td>

            <td><?php echo $receta['fecha_alta'] ?></td>
            <td class="inter-tabla">
              <a href='../home_cooking/marcar_favorito.php?id=<?php echo $receta["id"]; ?>&location=tabla_de_recetas.php&usu_id=<?php echo $_SESSION['usuario_activo']['id'] ?>' title="Marcar como favorito" class="in_table"> <i class="fa-solid fa-star"></i></a>
              <a href='receta_eliminar.php?receta_id=<?php echo $receta["id"]; ?>&location=tabla_de_recetas.php' title="Eliminar receta" class="in_table"> <i class="fa-solid fa-trash-can"></i> </a>
              <a href="receta_modificar.php?receta_id=<?php echo $receta['id']; ?>&location=tabla_de_recetas.php" role="button" class="btn btn-warning in_table" title="Editar receta"><i class="fa-solid fa-pencil"></i></a>
              <a href='detalles_receta.php?id=<?php echo $receta["id"]; ?>' title="Ver detalles" class="in_table"> <i class="fa-solid fa-eye"></i>
            </td>

          </tr>
        <?php } ?>
      </tbody>
    </table>

  </section>

  <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">


    </li>

    <li class="page-item">
      <?php
      if ($pagina == "1") {
        $pagina == "0";
        echo  "";
      } else {
        if ($pagina > 1)
          $ant = $pagina - 1;

        echo "<a class='page-link' id='cant_f' aria-label='Previous' href='tabla_de_recetas.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";

        if ($pagina - 2 < 1) {
        } else {

          echo "<li class='page-item '><a class='page-link' href='tabla_de_recetas.php?pag=" . ($pagina - 2) . "' >" . ($pagina - 2) . "</a></li>";
        }



        echo "<li class='page-item '><a class='page-link' href='tabla_de_recetas.php?pag=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
      }


      echo "<li class='page-item active'><a class='page-link' >" . $pagina . "</a></li>";

      $sigui = $pagina + 1;
      $ultima = $num_registros / $registros;
      if ($ultima == $pagina + 1) {
        $ultima == "";
      }
      if ($pagina < $paginas && $paginas > 1)

        echo "<li class='page-item'><a class='page-link' href='tabla_de_recetas.php?pag=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";

      if ($pagina + 1 < $paginas && $paginas > 2)

        echo "<li class='page-item'><a class='page-link' href='tabla_de_recetas.php?pag=" . ($pagina + 2) . "'>" . ($pagina + 2) . "</a></li>";

      if ($pagina < $paginas && $paginas > 1)



        echo " <li class='page-item'><a class='page-link' aria-label='Next' href='tabla_de_recetas.php?pag=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

      ?>

    <li class='page-item'><a id="cant-pag" class='page-link' aria-label='Next'><?php echo ceil($ultima) ?> Páginas</a>
  </ul>
</div>
<script src="js/favorito.js"></script>
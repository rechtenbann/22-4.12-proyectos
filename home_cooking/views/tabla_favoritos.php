<div class="container marketing">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin-top: 60px">
      <?php
      breadcrumb("Tabla de favoritos", "tabla_favoritos.php");

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
      <h3 class="h1_categoria">Tabla de favoritos:</h3>
    </div>
    <br>
    <table>
      <thead>
        <tr>
          <th> Comida </th>
          <th> Descripción </th>
          <th> País</th>

          <th> Favorito </th>
          <th> Ver a detalle </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($favoritos as $favorito) { ?>
          <tr class="tabla-recetas">
            <td>
              <div class="con"><?php echo $favorito['nombre'] ?></div>
            </td>
            <td>
              <div class="con"><?php echo $favorito['descripcion'] ?></div>
            </td>
            <td><?php echo $favorito['pais'] ?></td>

            <td> <a href='eliminar_favorito.php?id=<?php echo $favorito["id"]; ?>' title="Eliminar de favoritos"> <i class="fa-solid fa-trash-can"></i> </a> </td>
            <td> <a href='detalles_receta.php?id=<?php echo $favorito["id"]; ?>' title="ver a detalle"> <i class="fa-solid fa-eye"></i> </td>
            <!-- <td> <?php // echo $favorito["id"]; 
                      ?></td> -->
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </section>
  <div class="paginador">
    <nav id="pag" aria-label="...">
      <ul class="pagination pagination-sm">
        <?php
        for ($i = 1; $i <= $cant_pag; $i++) {
          if ($i == $pag) {
            echo "<li class='page-item active' aria-current='page'>
                   <span class='page-link'>" . $i . "</span>
               </li>";
          } else {
            echo "  <li class='page-item'><a class='page-link' href='favoritos.php?pag=" . $i . "</a></li>";
          }
        }
        ?>
      </ul>
    </nav>
  </div>

</div>
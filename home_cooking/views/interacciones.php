<div class="container marketing">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            breadcrumb("Interacciones de los usuarios", "interacciones.php");

            for ($i = 0; $i < count($bread); $i++) {
                if ($i == array_key_last($bread)) {
            ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                    } else {
                                                                                                        ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                } ?>
        </ol>
    </nav>
    <div class="titulocarrusel">
      <h3 class="h1_categoria">Recetas con más likes:</h3>
    </div>
    <section class="table-section">
        <table>
            <thead>
                <tr>
                    <th> Foto </th>
                    <th> Comida </th>
                    <th> Descripción</th>
            
                    <th> Likes</th>
                    <th> Ver a detalle </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($masLikes as $likes) { ?>
                    <tr class="tabla-recetas">
                        <?php if (file_exists('img/recetas/' . $likes['id'] . '/principal.jpg')) {  ?>
                            <td><?php echo "<img id='list' height='220px' src='img/recetas/" . $likes['id'] . "/principal.jpg'>" ?></td>
                        <?php } else { ?>
                            <td><?php echo "<img id='list' height='220px' src='img/error.png'>" ?></td>

                        <?php } ?>

                        <td><?php echo $likes['nombre'] ?>
                        <td>
                            <div class="con"><?php echo $likes['descripcion'] ?></div>
                        </td>
                       
                      
                        <td><?php echo $likes['cant'] ?></td>
                        <td> <a href='detalles_receta.php?id=<?php echo $likes["id"]; ?>' title="ver a detalle"> <i class="fa-solid fa-eye"></i> </td>
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

                echo "<a class='page-link' id='cant_f' aria-label='Previous' href='interacciones.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";

                if ($pagina - 2 < 1) {
                } else {

                    echo "<li class='page-item '><a class='page-link' href='interacciones.php?pag=" . ($pagina - 2) . "' >" . ($pagina - 2) . "</a></li>";
                }



                echo "<li class='page-item '><a class='page-link' href='interacciones.php?pag=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
            }


            echo "<li class='page-item active'><a class='page-link' >" . $pagina . "</a></li>";

            $sigui = $pagina + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $pagina + 1) {
                $ultima == "";
            }
            if ($pagina < $paginas && $paginas > 1)

                echo "<li class='page-item'><a class='page-link' href='interacciones.php?pag=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";

            if ($pagina + 1 < $paginas && $paginas > 2)

                echo "<li class='page-item'><a class='page-link' href='interacciones.php?pag=" . ($pagina + 2) . "'>" . ($pagina + 2) . "</a></li>";

            if ($pagina < $paginas && $paginas > 1)



                echo " <li class='page-item'><a class='page-link' aria-label='Next' href='interacciones.php?pag=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

            ?>

        <li class='page-item'><a id="cant-pag" class='page-link' aria-label='Next'><?php echo ceil($ultima) ?> Páginas</a>
    </ul>


    <div class="titulocarrusel">
      <h3 class="h1_categoria">Recetas con más favoritos:</h3>
    </div>
    <section class="table-section">
        <table>
            <thead>
                <tr>
                    <th> Foto </th>
                    <th>Título</th>
                    <th> Descripción </th>
                    
                    <th> Favoritos</th>
                    <th> Ver a detalle </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($masFav as $fav) { ?>
                    <tr class="tabla-recetas">

                        <?php if (file_exists('img/recetas/' . $fav['id'] . '/principal.jpg')) {  ?>
                            <td><?php echo "<img id='list' height='220px' src='img/recetas/" . $fav['id'] . "/principal.jpg'>" ?></td>
                        <?php } else { ?>
                            <td><?php echo "<img id='list' height='220px' src='img/error.png'>" ?></td>

                        <?php } ?>
                        <td><div class="con"><?php echo $fav['nombre'] ?></div></td>
                        <td>
                            <div class="con"><?php echo $fav['descripcion'] ?></div>
                        </td>
                       
                        <td><?php echo $fav['cant'] ?></td>
                        <td> <a href='detalles_receta.php?id=<?php echo $fav["id"]; ?>' title="ver a detalle"> <i class="fa-solid fa-eye"></i> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>

    <ul class="pagination pg-dark justify-content-center pb-5 pt-5 mb-0" style="float: none;">


        </li>

        <li class="page-item">
            <?php
            if ($pagina2 == "1") {
                $pagina2 == "0";
                echo  "";
            } else {
                if ($pagina2 > 1)
                    $ant = $pagina2 - 1;

                echo "<a class='page-link' id='cant_f' aria-label='Previous' href='interacciones.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";

                if ($pagina2 - 2 < 1) {
                } else {

                    echo "<li class='page-item '><a class='page-link' href='interacciones.php?pag=" . ($pagina2 - 2) . "' >" . ($pagina2 - 2) . "</a></li>";
                }



                echo "<li class='page-item '><a class='page-link' href='interacciones.php?pag=" . ($pagina2 - 1) . "' >" . $ant . "</a></li>";
            }


            echo "<li class='page-item active'><a class='page-link' >" . $pagina2 . "</a></li>";

            $sigui = $pagina2 + 1;
            $ultima = $num_registros2 / $registros2;
            if ($ultima == $pagina2 + 1) {
                $ultima == "";
            }
            if ($pagina2 < $pagina2s && $pagina2s > 1)

                echo "<li class='page-item'><a class='page-link' href='interacciones.php?pag=" . ($pagina2 + 1) . "'>" . $sigui . "</a></li>";

            if ($pagina2 + 1 < $pagina2s && $pagina2s > 2)

                echo "<li class='page-item'><a class='page-link' href='interacciones.php?pag=" . ($pagina2 + 2) . "'>" . ($pagina2 + 2) . "</a></li>";

            if ($pagina2 < $pagina2s && $pagina2s > 1)



                echo " <li class='page-item'><a class='page-link' aria-label='Next' href='interacciones.php?pag=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

            ?>

        <li class='page-item'><a id="cant-pag" class='page-link' aria-label='Next'><?php echo ceil($ultima) ?> Páginas</a>
    </ul>

</div>
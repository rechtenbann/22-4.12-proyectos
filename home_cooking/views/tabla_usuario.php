<div class="container marketing">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            breadcrumb("Tabla de usuarios", "tabla_usuario.php");

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
      <h3 class="h1_categoria">Tabla de usuarios:</h3>
    </div>
    <br>
        <table>
            <thead>
                <tr>
                    <th> Foto </th>
                    <th> Usuarios </th>
                    <th> Nombre </th>

                    <th class="mail"> Mail </th>
                    <th> Interacciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $fn) { ?>
                    <tr class="tabla-recetas">
                        <td>
                            <?php if (file_exists('img/user/' .  $fn['id'] . '/principal.jpg')) { ?>
                                <img id='list' height='220px' src="img/user/<?php echo $fn['id'] ?>/principal.jpg" alt="Tu foto">
                            <?php } else { ?>
                                <img id='list' height='220px' src="img/usuario.jpg" alt="Tu foto">
                            <?php } ?>
                        </td>
                        <td><?php echo $fn["nombre_usuario"] ?> </td>
                        <td><?php echo $fn["nombre"] ?> </td>

                        <td>
                            <div class="con"><?php echo $fn["mail"] ?> </div>
                        </td>
                        <td class="inter-tabla">
                            <a href="usuario_modificar.php?usuario_id=<?php echo $fn['id']; ?>" role="button" class="in_table" title="Editar usuario"><i class="fa-solid fa-pencil"></i></a>
                            <a href="usuario_eliminar.php?id=<?php echo $fn['id']; ?>" class="in_table" title="Eliminar usuario"><i class="fa-solid fa-trash-can"></i> </a>
                            <?php echo rango($fn['id']) ?>

                            <?php if ($session != $fn['id']) { ?>
                                <a href='perfil2.php?id_usu=<?php echo $fn["id"]; ?>' title="Perfil" class="in_table" title="Ver perfil"> <i class="fa-solid fa-eye"></i>
                            <?php } else if ($session == $fn['id']) { ?>
                                
                                <a href='profile.php' title="Perfil" class="in_table" title="Ver perfil"> <i class="fa-solid fa-eye"></i>
                            
                            <?php } ?>
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

                echo "<a class='page-link' id='cant_f' aria-label='Previous' href='tabla_de_usuarios.php?pag=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a>";

                if ($pagina - 2 < 1) {
                } else {

                    echo "<li class='page-item '><a class='page-link' href='tabla_de_usuarios.php?pag=" . ($pagina - 2) . "' >" . ($pagina - 2) . "</a></li>";
                }



                echo "<li class='page-item '><a class='page-link' href='tabla_de_usuarios.php?pag=" . ($pagina - 1) . "' >" . $ant . "</a></li>";
            }


            echo "<li class='page-item active'><a class='page-link' >" . $pagina . "</a></li>";

            $sigui = $pagina + 1;
            $ultima = $num_registros / $registros;
            if ($ultima == $pagina + 1) {
                $ultima == "";
            }
            if ($pagina < $paginas && $paginas > 1)

                echo "<li class='page-item'><a class='page-link' href='tabla_de_usuarios.php?pag=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";

            if ($pagina + 1 < $paginas && $paginas > 2)

                echo "<li class='page-item'><a class='page-link' href='tabla_de_usuarios.php?pag=" . ($pagina + 2) . "'>" . ($pagina + 2) . "</a></li>";

            if ($pagina < $paginas && $paginas > 1)



                echo " <li class='page-item'><a class='page-link' aria-label='Next' href='tabla_de_usuarios.php?pag=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

            ?>

        <li class='page-item'><a id="cant-pag" class='page-link' aria-label='Next'><?php echo ceil($ultima) ?> Páginas</a>
    </ul>
</div>
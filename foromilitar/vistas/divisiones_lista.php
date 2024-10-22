<link rel="stylesheet" href="css/mercadolibre.css">
<br>
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php" class="link">Inicio</a></li>
        <li class="breadcrumb-item text-light" aria-current="page">Mercado Libre</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <button class="btn btn-success"><i class="fa-sharp fa-solid fa-scroll"></i><a href="divisiones_alta.php" class="link-light" style="text-decoration: none;">Subir producto </a></i></button>&nbsp;&nbsp;

    <a href="carrito.php" class="btn btn-success"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Ver carrito </a>&nbsp;&nbsp;
    <a href="misarmas.php?pagina=1" class="btn btn-success"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Mis Productos </a>
  </div>
  <div align="center">
    <u style="color: white;">
      <h1 style="color: white;">Mercado Libre</h1>
    </u>
    <br>
    <u style="color: white;">
      <h3 style="color: white;" class="title"> Cantidad de Resultados (<?php echo $total_registros ?>)</h3>
    </u>
  </div>



  <div class="news-cards">
    <?php foreach ($dou as $xd) { ?>
      <div class="card-group">
        <div class="card mb-3">
          <div class="single-product">
            <div class="product-f-image">
              <?php
              if (file_exists('img/ventas/' . $xd['id_arma'] . '/principal.jpg')) { ?>
                <img class="card-img-top" src="img/ventas/<?php echo $xd['id_arma']; ?>/principal.jpg">
              <?php
              } ?>
              <div class="product-hover">
                <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Agregar al carrito</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $xd['nombre'] ?></h5>
            <p class="card-text"><?php echo $xd['descripcion'] ?></p>
            <p class="card-text">Precio: <?php echo $xd['precio'] ?></p>
            <p class="card-text">Tipo: <?php echo $xd['tipo'] ?></p>
            <p class="card-text">Nacionalidad: <?php echo $xd['pais'] ?></p>
            <?php
            if ($_SESSION['usu']['rol'] == 2) {
            ?>
              <a class="btn btn-danger" href="divisiones_eliminar.php?id_arma=<?php echo $xd['id_arma'] ?>">Eliminar</a>
              <a type="button" class="btn btn-warning" href="divisiones_modificar.php?id_arma=<?php echo $xd['id_arma']?>">Editar</a>
            <?php } ?>
            <?php
            if ($_SESSION['usu']['rol'] == 3) {
            ?>
              <a class="btn btn-danger" href="divisiones_eliminar.php?id_arma=<?php echo $xd['id_arma'] ?>">Eliminar</a>
            <?php } ?>

            <a class="btn btn-outline-success" type="button" href="armas3.php?id_arma=<?php echo $xd['id_arma']; ?>">Leer mas</a>

              <!-- USUARIOS -->
            <?php if ($_SESSION['usu']['nombre'] == $xd['usuario'] && $_SESSION['usu']['rol'] == 1) { ?>
              <a class="btn btn-danger" href="divisiones_eliminar.php?id_arma=<?php echo $xd['id_arma'] ?>">Eliminar</a>
              <a class="btn btn-warning" href="divisiones_modificar.php?id_arma=<?php echo $xd['id_arma']?>">Editar</a>
            <?php } ?>

            <!-- MODS -->
            <?php if ($_SESSION['usu']['nombre'] == $xd['usuario'] && $_SESSION['usu']['rol'] == 3) { ?>
              <a class="btn btn-warning" href="divisiones_modificar.php?id_arma=<?php echo $xd['id_arma']?>">Editar</a>
            <?php } ?>

            <!-- NO pueda comprarse asi mismo -->
            <?php if ($_SESSION['usu']['nombre'] != $xd['usuario']) { ?>
              <button type="button" class="btn btn-outline-success">Comprar</button>
            <?php } ?>

          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  

  <div class="container">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="divisiones_lista.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

        <?php for ($i = 0; $i < $paginas; $i++) { ?>
          <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="divisiones_lista.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
        <?php } ?>

        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="divisiones_lista.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
      </ul>
    </nav>
  </div>
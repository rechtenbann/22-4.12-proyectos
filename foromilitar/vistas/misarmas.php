<link rel="stylesheet" href="css/misarmas.css">
<nav aria-label="breadcrumb">
      <ol class="breadcrumb" style="margin-left: 30px; margin-top: 10px;">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item"><a href="divisiones_lista.php?pagina=1">Mercado Libre</a></li>
        <li class="breadcrumb-item text-light" aria-current="page">Publicar</li>
      </ol>
    </nav>
<?php if (isset($_SESSION['usu'])) { ?>
  <div class="container" style="text-align: right;">
    <a href="divisiones_alta.php" class="btn btn-success"><i class="fa-sharp fa-solid fa-scroll"></i> Subir producto </i></a>&nbsp;&nbsp;
    <a href="divisiones_lista.php?pagina=1" class="btn btn-success"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Mercado libre </a>
  </div>
  <div style="text-align:center;">
    <u style="color:white;">
      <h1 style="color:white;">Mis productos</h1>
    </u>
    <br>

  </div>

  <?php
  if (count($venta) > 0) { ?>
    <div class="news-cards">
      <?php
      foreach ($venta as $mis) {

      ?>

        <div class="card-group">
          <div class="card mb-3">
            <div class="single-product">
              <div class="product-f-image">
                <?php
                if (file_exists('img/ventas/' . $mis['id_arma'] . '/principal.jpg')) { ?>
                  <img class="card-img-top" src="img/ventas/<?php echo $mis['id_arma']; ?>/principal.jpg">
                <?php
                } ?>

              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $mis['nombre'] ?></h5>
              <p class="card-text"><?php echo $mis['descripcion'] ?></p>
              <p class="card-text">Precio: <?php echo $mis['precio'] ?></p>
              <p class="card-text">Nacionalidad: <?php echo $mis['pais'] ?></p>

              <a type="button" class="btn btn-danger" href="divisiones_eliminar.php?id_arma=<?php echo $mis['id_arma'] ?>">Eliminar</a>
              <a type="button" class="btn btn-warning" href="divisiones_modificar.php?id_arma=<?php echo $mis['id_arma'] ?>">Editar</a>



            </div>
          </div>
        </div>




      <?php } ?>
    </div>
    <div class="container">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="misarmas.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>

          <?php for ($i = 0; $i < $paginas; $i++) { ?>
            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="misarmas.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
          <?php } ?>

          <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="misarmas.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
        </ul>
      </nav>
    </div><?php } else if (count($venta) == 0) { ?>
    <h3 style="margin-bottom:600px;" align="center">
      <i class="fa-solid fa-circle-exclamation"></i> No se encontraron resultados
    </h3>
  <?php } ?>
<?php } ?>
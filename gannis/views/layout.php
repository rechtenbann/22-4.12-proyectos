<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>GANNIS</title>
  <link rel="icon" href="img\paww.png">

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Glider CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
  <link href="css/style.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/5.0/examples/carousel/carousel.css" rel="stylesheet">

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="js/main.js" referrerpolicy="origin"></script>
  <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- inclusion de la navbar -->
  <header>
    <?php require_once "views/menu.php"; ?>
  </header>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div>
    <!-- START THE FEATURETTES -->
    <?php
    $view = (isset($view)) ? $view : 'home';
    require_once $view . ".php";
    ?>
    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <div>
    <a id="scroll-up" href="#"><i class="fa-solid fa-chevron-up "></i></a>
  </div>


  <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- FOOTER -->
  <footer class="text-center text-lg-start text-muted sticky-bottom">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">

      </div>
      <!-- Left -->

      <!-- Right -->
      <div id="patito">
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/petorporation" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com/petorporation1/" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://github.com/et26alumnos/22-4.12-proyectos" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </section>

    <!--Links  -->
    <section class="">
      <div id="patito" class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div id="patito" class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h3 class="text-uppercase fw-bold mb-4">
              <img src="img/paww.png" class="logo-footer" alt=""> GANNIS
            </h3>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div id="patito" class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Animales en adopción</h6>
            <p>
              <i class="fas fa-paw"></i>
              <a href="todosadopt.php" class="text-reset footer-a">Todos</a>
            </p>
            <p>
              <i class="fas fa-dog"></i>
              <a href="perros.php" class="text-reset footer-a">Perros</a>
            </p>
            <p>
              <i class="fas fa-cat"></i>
              <a href="gatos.php" class="text-reset footer-a">Gatos
              </a>
            </p>
          </div>

          <!-- Grid column -->
          <div id="patito" class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Menu</h6>
            <p><i class="fas fa-info-circle"></i> <a href="sobrenosotros.php" class="text-reset footer-a">Sobre Nosotros</a></p>
            <p><i class="fas fa-book-open"></i> <a href="politica_privacidad.php" class="text-reset footer-a">Politicas de privacidad</a></p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div id="patito" class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
            <p><i class="fas fa-home me-3"></i> Balvanera,Buenos Aires, ARG</p>
            <p><i class="fas fa-envelope me-3"></i>PetOrporation@gmail.com </p>
            <p><i class="fas fa-phone me-3"></i> +54 9 11 XXXX-XXXX</p>
          </div>
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Copyright -->
    <div id="patito" class="text-center p-4" style="background-color: #f5b0bc;">
      © 2022 Copyright: PetOrporation.
    </div>
  </footer>



</body>

</html>
<html>

<head>
  <title>Global Elite</title>
  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/layout.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/LogoGlobal.png">
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <!-- LOGOS -->
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/9817c2b4db.js" crossorigin="anonymous"></script>
</head>

<body>


  <header class="sticky-top">
    <?php require_once "vistas/menu2.php"; ?>
  </header>
  <?php
  $section = (isset($section)) ? $section : 'home';
  require_once $section;
  ?>
  <!-- /END THE FEATURETTES -->
  <?php require_once "vistas/go_up.php"; ?>


  <footer class="pie-pagina" style="margin-top: 40;">
    <div class="grupo-1">
      <div class="box">
        <figure>
          <img src="img/logofooter.png" alt="">
          </a>
        </figure>
      </div>
      <div class="box">
        <h2>SOBRE NOSOTROS</h2>
        <p>Somos un grupo de estudiantes de secundaria que quiere cambiar la idea comun que tienen algunas personas sobre los militares, que se den cuneta que no solo son personas que van a la guerra, sino que son personas que le dedican su vida a proteger su amada nacion por la cual darian su vida si fuera necesario.</p>
      </div>
      <div class="box">
        <h2>SIGUENOS</h2>
        <div class="red-social">
          <a class="fa fa-facebook"></a>
          <a class="fa fa-instagram"></a>
          <a class="fa fa-twitter"></a>
          <a class="fa fa-youtube"></a>
        </div>
      </div>
    </div>
    <div class="grupo-2">
      <small>&copy; 2022 <b>Global Elite</b> - Todos los Derechos Reservados.</small>
    </div>
  </footer>
</body>

</html>
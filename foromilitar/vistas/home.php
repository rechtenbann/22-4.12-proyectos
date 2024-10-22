<link href="css/fondohome.css" rel="stylesheet">
<?php
if (isset($_SESSION['usu'])) {
?>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>
  <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:0;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
      <use xlink:href="#check-circle-fill" />
    </svg>
    Ya estas logueado <?php echo $_SESSION['usu']['nombre'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide card border-info mb-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/fondos/fondotienda.jpg" class="d-block w-100" style="width: 100% ; height: 800px;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Venta de armas legal</h2>
          <p>Visita nuestro mercado libre para vender tus productos o comprar algo que te interese.</p>
          <a href="divisiones_lista.php?pagina=1" class="btn"><button type="button" class="btn btn-dark">Venta de Armas <i class="fas fa-chevron-right"></i></button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fondos/fondoinscripciones.jpg" class="d-block w-100" style="width: 100% ; height: 800px;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Inscribete en las Fuerzas Armadas.</h2>
          <p >¿Estás interesado en inscribirte en las FF.AA.? ¡Haz click aquí!</p>
          <a href="inscripciones.php" class="btn"><button type="button" class="btn btn-dark">Inscripciones <i class="fas fa-chevron-right"></i></button></a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" style=" width: 50px;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" style=" width: 50px;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  </div>
  <br>
  <br>
  <u style="color: white;">
    <!-- inicio de cartas-->
    <h1 class="title" align="center" style="color: white;">Noticias</h1>
  </u><br><br>
  <div class="container">
    <div class="card-group">
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/heli.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 16 de septiembre de 2022</h6>
          <h5 class="card-title">Las Fuerzas Armadas incrementan su apoyo en la lucha contra los incendios...</h5>
          <a href="https://www.argentina.gob.ar/noticias/las-fuerzas-armadas-incrementan-su-apoyo-en-la-lucha-contra-los-incendios-del-delta" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/mili.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 20 de septiembre de 2022</h6>
          <h5 class="card-title">Apoyo a la comunidad:El Ejercito Argentino realizo la 116 Campana...</h5>
          <a href="https://www.argentina.gob.ar/noticias/apoyo-la-comunidad-el-ejercito-argentino-realizo-la-116deg-campana-alimentaria-al" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/co.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;" s>
        <div class="card-body">
          <h6> 21 de septiembre de 2022</h6>
          <h5 class="card-title">Taiana encabezo una reunion con el ministro de Industria de...</h5>
          <a href="https://www.argentina.gob.ar/noticias/taiana-encabezo-una-reunion-con-el-ministro-de-industria-de-cordoba-y-autoridades-de-carae" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/f5.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 22 de septiembre de 2022</h6>
          <h5 class="card-title">Con la presencia de Taiana, LADE inauguró una nueva ruta aérea que...</h5>
          <a href="https://www.argentina.gob.ar/noticias/con-la-presencia-de-taiana-lade-inauguro-una-nueva-ruta-aerea-que-conecta-la-localidad-de" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <u style="color: white;">
    <h1 class="title" align="center" style="color: white;">Noticias Destacadas</h1>
  </u><br><br>
  <div class="container">
    <div class="card-group">
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/desa.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 12 de septiembre de 2022</h6>
          <h5 class="card-title">Se designo al Centro de Experimentacion y Lanzamiento de Proyectiles Auto...</h5>
          <a href="https://www.argentina.gob.ar/noticias/se-designo-al-centro-de-experimentacion-y-lanzamiento-de-proyectiles-autopropulsados-con-el" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/ciber.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 20 de septiembre de 2022</h6>
          <h5 class="card-title">El Ministerio de Defensa y la UNRaf firmaron un convenio de...</h5>
          <a href="https://www.argentina.gob.ar/noticias/el-ministerio-de-defensa-y-la-unraf-firmaron-un-convenio-de-cooperacion-para-el-desarrollo" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/rio.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 21 de septiembre de 2022</h6>
          <h5 class="card-title">Inundaciones en Comodoro Rivadavia: Fuerzas Armadas instalan puente...</h5>
          <a href="https://www.argentina.gob.ar/noticias/inundaciones-en-comodoro-rivadavia-fuerzas-armadas-instalan-puente-bailey-en-apoyo-la" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/despli.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 22 de septiembre de 2022</h6>
          <h5 class="card-title">Despliegue de aviones Pampa III en el sur del pais a fin de incrementar...</h5>
          <a href="https://www.argentina.gob.ar/noticias/despliegue-de-aviones-pampa-iii-en-el-sur-del-pais-fin-de-incrementar-la-vigilancia-aerea" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <!--fin de las cartas-->

  <!-- SLIDER 1 -->

  <div class="container" id="slider">
    <div id="carouselExampleIndicators" class="carousel slide card border-info mb-3" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/fondos/fondologin.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/fondos/fondoinscripciones.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/fondos/fondoshowcase.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </div>

  <!---Informes 
  <br>
  <u style="color: white;">
    <h1 class="title" align="center" style="color: white;">Informes</h1>
  </u><br>
  <div class="container">
    <div class="row">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  fin de los informes --->
<?php
} else {
?>
  <div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin:0;">
    No estas logueado <a href="validar.php">Inicia Sesion</a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide card border-info mb-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/fondos/fondoshowcase.jpg" class="d-block w-100" style="width: 100% ; height: 800px;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Registro nuevos usuarios.</h2>
          <p>Aqui te damos un espacio para que puedas registrarte con un usuario y empezar a formar parte de la comunidad de esta pagina.</p>
          <a href="register.php" class="btn"><button type="button" class="btn btn-dark">Registrate <i class="fas fa-chevron-right"></i></button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fondos/fondologin.jpg" class="d-block w-100" style="width: 100% ; height: 800px;" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>Login para usuarios ya registrados.</h2>
          <p> ¿Ya tienes cuenta? Logueate aqui y vuelve a tu usuario.</p>
          <a href="vistas/login.php" class="btn"><button type="button" class="btn btn-dark">Iniciar Sesion <i class="fas fa-chevron-right"></i></button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/fondos/fondoinscripciones.jpg" class="d-block w-100" style="width: 100% ; height: 800px;" alt="...">
        <div class="carousel-caption d-none d-md-block" charset = utf-8
>
          <h2>Inscribete en las Fuerzas Armadas.</h2>
          <p>¿Estás interesado en inscribirte en las FF.AA.? ¡Haz click aquí!
            
          </p><br>
          <p>Para inscribirte debes estar logueado</p>
          <a href="vistas/login.php" class="btn"><button type="button" class="btn btn-dark">Iniciar Sesion <i class="fas fa-chevron-right"></i></button></a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" style=" width: 50px;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" style=" width: 50px;" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  </div>
  <br>
  <br>
  <u style="color: white;">
    <!-- inicio de cartas-->
    <h1 class="title" align="center" style="color: white;">Noticias</h1>
  </u><br><br>
  <div class="container">
    <div class="card-group">
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/heli.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 16 de septiembre de 2022</h6>
          <h5 class="card-title">Las Fuerzas Armadas incrementan su apoyo en la lucha contra los incendios...</h5>
          <a href="https://www.argentina.gob.ar/noticias/las-fuerzas-armadas-incrementan-su-apoyo-en-la-lucha-contra-los-incendios-del-delta" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/mili.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 20 de septiembre de 2022</h6>
          <h5 class="card-title">Apoyo a la comunidad:El Ejercito Argentino realizo la 116 Campana...</h5>
          <a href="https://www.argentina.gob.ar/noticias/apoyo-la-comunidad-el-ejercito-argentino-realizo-la-116deg-campana-alimentaria-al" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/co.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;" s>
        <div class="card-body">
          <h6> 21 de septiembre de 2022</h6>
          <h5 class="card-title">Taiana encabezo una reunion con el ministro de Industria de...</h5>
          <a href="https://www.argentina.gob.ar/noticias/taiana-encabezo-una-reunion-con-el-ministro-de-industria-de-cordoba-y-autoridades-de-carae" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/f5.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 22 de septiembre de 2022</h6>
          <h5 class="card-title">Con la presencia de Taiana, LADE inauguró una nueva ruta aérea que...</h5>
          <a href="https://www.argentina.gob.ar/noticias/con-la-presencia-de-taiana-lade-inauguro-una-nueva-ruta-aerea-que-conecta-la-localidad-de" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <u style="color: white;">
    <h1 class="title" align="center" style="color: white;">Noticias Destacadas</h1>
  </u><br><br>
  <div class="container">
    <div class="card-group">
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/desa.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 12 de septiembre de 2022</h6>
          <h5 class="card-title">Se designo al Centro de Experimentacion y Lanzamiento de Proyectiles Auto...</h5>
          <a href="https://www.argentina.gob.ar/noticias/se-designo-al-centro-de-experimentacion-y-lanzamiento-de-proyectiles-autopropulsados-con-el" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/ciber.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 20 de septiembre de 2022</h6>
          <h5 class="card-title">El Ministerio de Defensa y la UNRaf firmaron un convenio de...</h5>
          <a href="https://www.argentina.gob.ar/noticias/el-ministerio-de-defensa-y-la-unraf-firmaron-un-convenio-de-cooperacion-para-el-desarrollo" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/rio.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 21 de septiembre de 2022</h6>
          <h5 class="card-title">Inundaciones en Comodoro Rivadavia: Fuerzas Armadas instalan puente...</h5>
          <a href="https://www.argentina.gob.ar/noticias/inundaciones-en-comodoro-rivadavia-fuerzas-armadas-instalan-puente-bailey-en-apoyo-la" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
      <div class="card text-dark bg-light mb-3" style="width: 22rem;">
        <img src="img/cartas/despli.png" class="card-img-top" alt="..." style="width: 100%; height:10rem;">
        <div class="card-body">
          <h6> 22 de septiembre de 2022</h6>
          <h5 class="card-title">Despliegue de aviones Pampa III en el sur del pais a fin de incrementar...</h5>
          <a href="https://www.argentina.gob.ar/noticias/despliegue-de-aviones-pampa-iii-en-el-sur-del-pais-fin-de-incrementar-la-vigilancia-aerea" class="btn btn-outline-dark" target="_blank">Leer mas >></a>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <!--fin de las cartas-->

  <!-- SLIDER 1 -->

  <div class="container" id="slider">
    <div id="carouselExampleIndicators" class="carousel slide card border-info mb-3" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/fondos/fondologin.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/fondos/fondoinscripciones.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/fondos/fondoshowcase.jpg" class="d-block w-100" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </div>
  <!-- de aqui en adelante estaran informes y lo que se les cante -->

  <!---Informes 
   <br>
  <u style="color: white;">
    <h1 class="title" align="center" style="color: white;">Informes</h1>
  </u><br>
  <div class="container">
    <div class="row">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="..." class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  fin de los informes --->
<?php } ?>


<!-- fin del html -->
<!--area de funciones-->


<!--fin del area de funciones-->
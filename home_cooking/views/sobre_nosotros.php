<div class="sobre-n">
  <div class="text-section">
    <h1>Sobre Nosotros</h1>
    <p>Home Cooking y Misk'i</p>
  </div>
</div>

<div class="container marketing">

  <br>
  <div class="sobrenosotros">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <?php
        breadcrumb("Sobre nosotros", "sobre_nosotros.php");

        for ($i = 0; $i < count($bread); $i++) {
          if ($i == array_key_last($bread)) {
        ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i] ?></li> <?php
                                                                                                  } else {
                                                                                                    ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i] ?>"><?php echo $bread[0][$i] ?> </a></li> <?php
                                                                                                                                                                                                              }
                                                                                                                                                                                                            } ?>
      </ol>
    </nav>
    <div class="texto1">
      <div class="about-section">
        <div class="inner-container">
          <h1 id="h2_sobre">Un poco sobre nosotros</h1>
          <p class="text" id="text">
            Home cooking es una empresa que nació durante el mes de abril del año 2022, creada por alumnos/as de la escuela técnica N°26 D.E. N°6 Confederación Suiza (Argentina, Buenos Aires), con el objetivo de crear una página de recetas donde cada individuo pueda explorar diversas recetas internacionales y además compartir su propia receta, esto con el fin de que se produzca una mezcla de culturas gastronómicas. La funcionalidad de la página se asimila a la app instagram, ya que puedes compartir tus propias publicaciones sobre recetas e indicar si te gusta alguna publicación con el botón de like.
          </p>
        </div>
      </div>
      <br>
    </div>
    <div class="row align-items-md-stretch">
      <div class="col-md-6" id="card-1-sn">
        <div class="h-100 p-5 bg-light border rounded-3">
          <div class="text_sobre">
            <h2 id="h4_sobre">Origen de nuestro nombre</h2>
            <p class="text" id="text">El nombre es una combinación de dos palabras que conforman una frase en inglés, que al español se traduce como "cocina casera" (Home cooking).</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2 id="h4_sobre">¿Quienes somos y qué hacemos?</h2>
          <p class="text" id="text">Somos estudiantes de 4to año y conformamos un equipo de desarrollo con el cual trabajamos en este proyecto de Home Cooking.</p>

        </div>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7" id="sobre-nosotros">
        <h6 id="h2_sobre">¿Cuál es la diferencia de nuestro proyecto con la competencia?</h6>
        <br>
        <p class="text" id="text"> Muy simple, nuestra página te permite participar a diferencia de otras que sólo te brindan información sobre recetas, la nuestra te permite compartir con el mundo tu propia receta, te permite indicarle o mostrarle a otros usuarios que te gustó su contenido de cocina, lo que genera una interacción positiva gracias a que se comparten distintas culturas gastronómicas.</p>
      </div>
      <div class="col-md-5" id="img1-sn">
        <img class="img-sn-p" src="img/team7.jpg">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-5" id="img2-sn">
        <img class="img-sn-p" src="img/work.jpg">
      </div>
      <div class="col-md-7" id="sobre-nosotros">
        <h6 id="h2_sobre">¿Que tiene por finalidad el proyecto? </h6>
        <br>
        <p class="text" id="text"> La finalidad de Miski es convertirse en toda una comunidad de personas que compartan sus diferentes platillos internacionales, de esta forma transformarse en una página con diversidad gastronómica, que no trate de un plato en específico. También que las personas que compartan sus recetas y reciban likes puedan ver que su platillo les sirvió a otros individuos.</p>
      </div>
    </div><br>

    <hr class="featurette-divider">
    <!-------------------------------------------------INTEGRANTES------------------------------------------------------>

    <div class="container">
      <div class="intro">
        <h2 class="text-center" id="tit">Equipo de Desarrollo </h2>
        <p class="text-center" id="subtit">Este es el quipo de desarrollo y diseño que llevo a cabo el proyecto: </p>
      </div>
      <div class="row people">
        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/teruel.png">
            <h3 class="name" id="nombre">Gabriel Teruel</h3>
            <b>
              <p class="title" id="cat">Profesor</p>
            </b>
            <p class="description"> Clase desaprobada 👎😤😠</p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/gabiiter"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/claudia.png">
            <h3 class="name" id="nombre">Claudia Vergara</h3>
            <b>
              <p class="title" id="cat">Scrum Master</p>
            </b>
            <p class="description"> Facil de estresar, pero tambien sabe respirar, le gusta ser feliz 🥳 </p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/claudia.vergara_"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/angie.png">
            <h3 class="name" id="nombre">Angie Ventura</h3>
            <b>
              <p class="title" id="cat">Desarrolladora y Diseñadora</p>
            </b>
            <p class="description"> Le gusta estar aprendiendo constantemente, esta muy involucrada en el desarrollo de la pagina y duerme poco... ☹️ </p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/vnt.angie"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/tobi.png">
            <h3 class="name" id="nombre">Tobias Coman</h3>
            <b>
              <p class="title" id="cat">Desarrollador</p>
            </b>
            <p class="description"> Friki pero no lo admite, bastante competitivo y tiene facilidad para aprender. 😎🦔🙇🏽‍♂️ </p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/comanporfavor"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/lean.png">
            <h3 class="name" id="nombre">Leandro Gomez</h3>
            <b>
              <p class="title" id="cat">Desarrollador y Diseñador</p>
            </b>
            <p class="description"> Callado pero sabio, dedicado y pacifico ✌☮️🤾🏻‍♀️ </p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 item">
          <div class="box"><img class="rounded-circle" src="img/integrantes/folco.png">
            <h3 class="name" id="nombre">Luca Folco</h3>
            <b>
              <p class="title" id="cat">Desarrollador y Diseñador</p>
            </b>
            <p class="description"> Ricotero, lolero, tambien escucha Charly y es hincha del Globo! 🤘🎸🎈 </p>
            <div class="social"><a href="#"><i class="fa fa-facebook-official" id="sociales"></i></a><a href="#"><i class="fa fa-twitter" id="sociales"></i></a><a href="https://www.instagram.com/folcooo_"><i class="fa fa-instagram" id="sociales"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
  </body>
<?php echo (isset($msj) ? $msj : ''); ?>
<div class="d-lg-flex half" >
  <div class="bg order-1 order-md-2" style="background-image: url('img/bg_1.jpg');"></div>
  <div class="contents order-2 order-md-1">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-11">
          <h3 id="loginh3">Registrate en <strong>Home Cooking</strong></h3>
          <div id="caja-msj" class="form-group">
            <?php echo (isset($msj) ? $msj : ''); ?>
          </div>
          <form method="POST" action="registro.php">

            <div class="row">
              <div class="col input-con">
                <input name="nombre" type="text" class="form-control input-control" placeholder="Nombre" id="name" required>
              </div>

              <div class="col input-con">
                <input name="usuario" type="text" class="form-control input-control" placeholder="Nombre de usuario" id="username" required>

              </div>
            </div>
            <div class="row">
              <div class="col input-con">
                <input name="mail" type="email" class="form-control input-control" placeholder="Email" id="mail" required>
              </div>

              <div class="col input-con">
                <select name="select" id="select" class="form-control input-control" aria-label="Default select example" required>
                  <option selected>Indistinto</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col input-con">
                <input name="password" type="password" class="form-control input-control" placeholder="Contraseña" id="password" required>
              </div>

              <div class="col input-con">
                <input name="password2" type="password" class="form-control input-control" placeholder="Repetir Contraseña" id="password2" required>
              </div>
            </div>


            <div class="noregis">

              <input id="iniciar" type="button" value="Enviar" class="btn btn-block btn-primary">

            </div>


            <div class="d-flex align-items-center">
              <span id="Noregis" class="ml-auto forgot-pass">¿Ya tenes cuenta?<a class="forgot-pass" href="inicio_sesion.php"> ¡Inicia sesión!</a></span>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="js/register.js"></script>
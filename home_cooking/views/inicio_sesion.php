<div class="d-lg-flex half">
  <div class="bg order-1 order-md-2" style="background-image: url('img/bg_1.jpg');"></div>
  <div class="contents order-2 order-md-1">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
          <h3 id="loginh3">Inicia en <strong>Home Cooking</strong></h3>
          <div id="caja-msj" class="form-group">
            <?php echo (isset($msj) ? $msj : ''); ?>
          </div>
          <form method="POST" action="inicio_sesion.php">
            <div class="form-group first">
              
              <input name="mail" type="email" class="form-control" placeholder="Email" id="username" required value= "<?php echo (isset($_COOKIE['mail'])) ? $_COOKIE['mail'] : '' ?>"> 
            </div>
            <div class="form-group last mb-3">
              
              <input name="password" type="password" class="form-control" placeholder="Contraseña" id="password" required value="<?php echo (isset($_COOKIE['password'])) ? $_COOKIE['password'] : '' ?>">
            </div>

            <div class="form-check">
            <input type="checkbox" id="cookie" name="recordar" value="SI" <?php echo (isset($_COOKIE['recordar']))? 'checked' : '' ?>> Recuerdame
            

            <div class="d-flex mb-2 align-items-center">

              <span class="ml-auto"><a href="#" class="forgot-pass">¿Olvidaste tu contraseña?</a></span>
            </div>

              <div id="div-sesion" class="sesion"><input id="regist" type="button" value="Enviar" class="btn btn-block btn-primary"></div>

              <div class="d-flex align-items-center">
                <span id="Noregis" class="ml-auto forgot-pass">¿No tienes una cuenta?<a class="forgot-pass" href="registro.php"> ¡Registrate!</a></span>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/login.js"></script>
<div class="container container-ini">
	<h5 class="titleini">¡Bienvenido de vuelta!</h5>
	<form action="comprobar_inicio.php" method="POST">
	<?php if (isset($msj)) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $msj; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php } ?>
		<div class="input-group mb-3" name="mail">
			<span class="input-group-text in-se" id="basic-addon1"><i class="fa-solid fa-envelope fa-envelope3"></i></span>
			<input value="<?php echo (isset($_COOKIE['mail'])) ? $_COOKIE['mail'] : '' ?>" name="mail" type="text" class="form-control" id="floatingInput" placeholder="Correo electronico">
		</div>
		<div class="input-group mb-3" name="contrasena">
			<span class="input-group-text in-se" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
			<input value="<?php echo (isset($_COOKIE['contrasena'])) ? $_COOKIE['contrasena'] : '' ?>" name="contrasena" type="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
		</div>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" name="recordar" value="SI" <?php echo (isset($_COOKIE['recordar'])) ? 'checked' : '' ?>> Recuerdame
			</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>
	</form>
	<div class="footerini">
		¿No tenes cuenta?
		<a data-bs-toggle="modal" href="#registro" role="button" data-bs-dismiss="modal">Registrate</a>
	</div>
</div>
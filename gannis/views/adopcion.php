<div class="modal fade" id="adoptar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content modal-adopcion">
			<div class="modal-header">
				<h5 class="modal-title titititle" id="exampleModalToggleLabel2">¿Deseas adoptar a <?php echo $mascotas['nombre'] ?>?</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body form-adop">
				<main class="form-signin w-100 m-auto">
					<p id="infofo">Al solicitar la adopción de <b><?php echo $mascotas['nombre'] ?></b> se compromete a ya haber leído previamente toda la información de la mascota y poder ofrecerle todo lo necesario para que esta tenga una vida feliz y plena.</p>
					<h6>Tus datos:</h6>
					<div class="misdatos">
						<p>Nombre: <?php echo $_SESSION['usuario']['nombre'] ?></p>
						<p>Email: <?php echo $_SESSION['usuario']['mail'] ?></p>
						<p>Numero de telefono: <?php echo ($_SESSION['usuario']['telefono'])== 0? 'Porfavor ingrese un telefono' : $_SESSION['usuario']['telefono'] ?></p>
					</div>
					<?php if ($_SESSION['usuario']['telefono'] == 0) { ?>
					<form method="POST" action="enviar_msj.php">
						<div class="input-group mb-3 tel" REQUIRED>
							<input type="hidden" name="mascota" value="<?php echo $mascotas['id']; ?>">
						</div>
					<?php } else { ?>
					<form method="POST" action="enviar_msj.php">
						<div class="input-group mb-3 tel" REQUIRED>
							<input class="form-control" type="number" name="telefono" placeholder="Telefono" value="<?php echo $_SESSION['usuario']['telefono']; ?>" hidden REQUIRED>
							<input name="mascota" value="<?php echo $mascotas['id']; ?>" hidden>
						</div><?php } ?>
						<h6 id="title">Mensaje:</h6>
						<textarea name="mensaje" placeholder="Escriba su mensaje" rows="6" REQUIRED></textarea>
						<p id="infofo">La solicitud la recibirá y sera analizada por <b><?php echo $org['nombre'] ?></b> para verificar que sea compatible con las caracteristicas requeridas</p>
						<input class="form-check-input checkado" type="checkbox" name="politica_priv" id="politica_priv" REQUIRED>
						<label class="form-check-label" for="politica_priv">
							He leído y acepto la <a href="politica_privacidad.php" class="poli" Target="_blank">política de privacidad</a>
						</label>
						<input type="submit" value="Enviar" id="ina" class="btn btn-secondary ina">
					</form>
				</main>
			</div>
		</div>
	</div>
</div>
<div  class="container marketing">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php 
        breadcrumb("Modificacion de usuario", "usuario_modificar.php");

        for($i = 0; $i < count($bread); $i++){
        if($i == array_key_last($bread)){
            ?> <li class="breadcrumb-item active" aria-current="page"><?php echo $bread[0][$i]?></li> <?php 
        }
        else{
            ?> <li class="breadcrumb-item"><a href="<?php echo $bread[1][$i]?>"><?php echo $bread[0][$i]?> </a></li> <?php 
        }
        } ?>
    </ol>
</nav>
<h1>Modificar usuario</h1>
<form method="POST">
    <div class="mb-3">
        <label for="formGroupTitulo" class="form-label">Usuario</label>
        <input name="nombre_usuario" type="text" class="form-control" id="formGroupTitulo" placeholder="Titulo" value="<?php echo $usuario['nombre_usuario']; ?>">
    </div>
    <div class="mb-3">
        <label for="formGroupDescripcion" class="form-label">Nombre</label>
        <textarea name="nombre" class="form-control" id="formGroupDescripcion"><?php echo $usuario['nombre']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="formGroupDescripcion" class="form-label">Mail</label>
        <textarea name="mail" class="form-control" id="formGroupDescripcion" placeholder="Another input placeholder"><?php echo $usuario['mail']; ?></textarea>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile">
    </div>

    <select name="genero" class="form-select" aria-label="Default select example">
        <option selected>Genero</option>
        <option value="Femenino">Femenino</option>
        <option value="Masculino">Masculino</option>
        <option value="Indistinto">Indistinto</option>
    </select>
	
	<br><br>
    <button type="submit" class="btn btn-primary mb-3">Guardar</button>
</form>
</div>
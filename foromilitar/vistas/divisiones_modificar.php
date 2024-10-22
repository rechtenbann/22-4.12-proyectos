<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="css/fondoventa.css" rel="stylesheet">
<br>
<?php if (isset($_SESSION['usu'])) {?>
<div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
          <li class="breadcrumb-item"><a href="divisiones_lista.php?pagina=1" class="link-info">Mercado Libre</a></li>
          <li class="breadcrumb-item text-light" aria-current="page">Publicar</li>
        </ol>
      </nav>
    </div>
  <div class
<u style="color:white;">
    <h1 align="center" class="title" style="color:white;">Publicar Producto</h1>
</u>
<br>

<div class="container">
    <div class="form-control border-info mb-3">
        <form method="post" enctype="multipart/form-data">
            <label for="exampleFormControlInput1" class="form-label">Nombre del producto</label>
            <input class="form-control" type="text" placeholder="Ingresar el nombre del producto" aria-label="default input example" name="nombre" required><br>
            <label for="exampleFormControlInput1" class="form-label">Tipo de arma</label>
            <input class="form-control" type="text" placeholder="Ingresar el tipo de arma del producto" aria-label="default input example" name="tipo" required><br>
            <label for="exampleFormControlInput1" class="form-label">Nacionalidad del producto</label>
            <select class="form-select" aria-label="Default select example" name="nacioanlidad" required>
                <?php foreach ($paises as $pais) { ?>
                    <option value="<?php echo $pais['id']; ?>"><?php echo $pais['pais']; ?></option>
                <?php } ?>
            </select><br>
            <label for="formGroupDescripcion" class="form-label">Agrega un descripcion</label>
            <textarea name="info" class="form-control" id="formGroupDescripcion" placeholder="Agrega un descripcion sobre el producto" required></textarea><br>
            <label for="formFile" class="form-label">Agrega una foto del producto</label>
            <input class="form-control" type="file" id="formFile" name="principal_img" required><br>
            <label for="exampleFormControlInput1" class="form-label">Precio del producto</label>
            <input class="form-control" type="text" placeholder="Ingresar el precio del producto" aria-label="default input example" name="precio" required><br>
            <button type="submit" class="btn btn-success mb-3">Publicar</button>
            <button type="submit" class="btn btn-danger mb-3"><a href="divisiones_lista.php?pagina=1" class="link-light" style="text-decoration:none;">Cancelar</a></button>
        </form>
    </div>
</div>
<?php }else{ header("Location : index.php"); }?>
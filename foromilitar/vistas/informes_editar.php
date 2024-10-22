<link href="css/informes.css" rel="stylesheet">
<?php
if (isset($_SESSION['usu'])) {
?>
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
                <li class="breadcrumb-item"><a href="informes2.php?pagina=1" class="link-info">Informes</a></li>
                <li class="breadcrumb-item"><a href="misinformes.php?pagina=1" class="link-info">Mis Informes</a></li>
                <li class="breadcrumb-item text-light" aria-current="page">Formulario de Informes</li>
            </ol>
        </nav>
    </div>
    <h1 class="title" align="center" style="color: white;">Formulario de Informes</h1>
    <br>
    <div class="container">
        <div class="form-control border-info mb-3">
            <form method="post" enctype="multipart/form-data" action="informes.php">
                <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                <input class="form-control" type="text" placeholder="Ingrese titulo del informe" aria-label="default input example" name="titulo" required><br>
                <label for="exampleFormControlInput1" class="form-label">Informacion</label>
                <input class="form-control" type="text" placeholder="Ingrese informacion del informe " aria-label="default input example" name="info" required><br>
                <label for="formGroupDescripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" class="form-control" placeholder="Ingrese descripcion del informe" required></textarea><br>
                <label for="formFile" class="form-label">Agrega una foto del producto</label>
                <input class="form-control" type="file" id="formFile" name="principal2_img" required><br>
                <button type="submit" class="btn btn-success mb-3">Publicar</button>
                <button type="submit" class="btn btn-danger mb-3">Cancelar</button>
            </form>
        </div>
    </div>
    <?php }else{ header("location : index.php"); }?>
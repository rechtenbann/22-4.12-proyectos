
<?php
if (isset($_SESSION['usu'])) { ?>
    <link href="css/perfil.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="img/LogoGlobal.png">
    <!------ Include the above in your HEAD tag ---------->
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
                <li class="breadcrumb-item text" aria-current="page">Perfil</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="container emp-profile">
            <form method="POST" enctype="multipart/form-data" action="perfil.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="img/usuarios/<?php echo $_SESSION['usu']['foto'] ?>" style="object-fit:cover; height:120px; width:120px; border:solid 5px black; border-radius:50%;" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                            <h5>
                                <?php echo $usuario['nombre'] ?>
                            </h5>
                            <?php if ($_SESSION['usu']['rol'] == 2) { ?>
                                <h6 style="color:red">
                                    Rango: Administrador
                                </h6>
                            <?php } else if ($_SESSION['usu']['rol'] == 1) { ?>
                                <h6 style="color:blue">
                                    Rango: Usuario
                                </h6>
                            <?php } ?>
                            <div class="list-group list-group-horizontal-sm text-md-center" style="height:40px; width:200px;">
                                <a class="list-group-item list-group-item-action active" id="home-list-item" data-bs-toggle="list" href="#home">Info</a>
                                <a class="list-group-item list-group-item-action" id="profile-list-item" data-bs-toggle="list" href="#profile">Editar</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <br><br>
                                <a href="logout.php"><button type="button" class="btn btn-outline-danger">Cerrar sesi&oacute;n</button></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Usuario</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $usuario['nombre'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $usuario['correo'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Telefono</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $usuario['telefono'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Descripci&oacute;n</label>
                                        </div>
                                        <p><?php echo $usuario['descripcion'] ?></p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label style="margin-bottom: 10px;">Cambiar foto de perfil</label>
                                            <input class="form-control" name="archivo" type="file" id="name"><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" name="nombre" value="<?php echo  $usuario['nombre']; ?>" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Descripci&oacute;n</label>
                                            <input type="text" name="descripcion" value="<?php echo  $usuario['descripcion'] ?>" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Telefono</label>
                                            <input type="text" name="telefono" value="<?php echo  $usuario['telefono'] ?>" class="form-control">
                                        </div>
                                        <input type="submit" class="btn btn-success" name="editar" value="Guardar cambios" id="editar" style="margin-top: 30px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
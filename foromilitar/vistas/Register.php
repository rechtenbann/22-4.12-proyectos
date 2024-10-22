<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<link rel="stylesheet" href="css/login.css">
<title>Registrarse</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div style="background-color:white; height:600px;" class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <a href="index.php"><img src="img/LogoGlobal.png" class="brand_logo" alt="Logo"></a>
                </div>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="Register.php" method="POST">
                    <h1 style="   margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px; margin-top:-50px;">REGISTRARSE</h1>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input required type="text" class="form-control input_user" value="<?php if ($c == true) {
                                                                                                echo "";
                                                                                            }
                                                                                            if ($c == false) {
                                                                                                echo $_SESSION['usu'];
                                                                                            } ?>" name="usu" placeholder="Usuario">


                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input required type="email" class="form-control input_pass" placeholder="Correo Electronico" value="<?php if ($c == true) {
                                                                                                                                    echo "";
                                                                                                                                }
                                                                                                                                if ($c == false) {
                                                                                                                                    echo $_SESSION['correo'];
                                                                                                                                } ?>     " name="correo">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>

                        <input required type="password" class="form-control input_pass" placeholder="Contraseña" name="contra">

                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>

                        <input required type="password" class="form-control input_pass" placeholder="Confimar Contraseña" name="confi">

                    </div>

                    <?php if (isset($_POST['contra']) && isset($_POST['confi'])) {
                        if ($aa == false) { ?>
                            <div style="width:250px; text-align:center; height:50px;" class="alert alert-danger d-flex align-items-center" role="alert">

                                <div>
                                    Las contraseñas no coinciden
                                </div>
                            </div>
                    <?php }
                    }  ?>
                    <?php if (isset($_POST['usu'])) {
                        if ($g == false) { ?>
                            <div style="width:250px; text-align:center; height:50px;" class="alert alert-danger d-flex align-items-center" role="alert">

                                <div>
                                    El nombre de usuario ya esta en uso
                                </div>
                            </div>
                    <?php }
                    }  ?>






                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn">Registrarse</button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Ya tienes una cuenta<a href="validar.php">Inicia Sesion</a><br>
                </div>

                <div class="d-flex justify-content-center links">
                    <a href="index.php">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>
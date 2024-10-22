<link href="css/fondoarmas.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#prov').val(1);
        recargarLista();

        $('#prov').change(function() {
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "localidad.php",
            data: "id_provincia1=" + $('#prov').val(),
            success: function(r) {
                $('#select1').html(r);
            }
        });
    }
</script>
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin-left: 50px;">
        <li class="breadcrumb-item"><a href="index.php" class="link-info">Inicio</a></li>
        <li class="breadcrumb-item text-light" aria-current="page">Inscripciones</li>
    </ol>
</nav>
<div class="container">
    <form class="form-control border-info mb-3" method="post">
        <u>
            <h1 class="title" align="center">Inscripciones</h1>
        </u>
        <br>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Leonel Agustin" name="nombre" required>
                    <label for="floatingInputGrid">Nombre Completo</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Condori Vilca" name="apellido" required>
                    <label for="floatingInputGrid">Apellido Completo</label>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" name="nacionalidad" required>
                            <option value="nacionalidad de origen">Nacionalidad de origen</option>
                            <option value="naturalizado">Naturalizado</option>
                            <option value="por opcion">Por opcion</option>
                        </select>
                        <label for="floatingSelectGrid">Nacionalidad</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select" id="prov" name="id_provincia" required>
                            <?php foreach ($provincias as $provincia) { ?>
                                <option value="<?php echo $provincia['id']; ?>"><?php echo $provincia['provincia']; ?></option>
                            <?php } ?>
                        </select>
                        <label for="floatingSelectGrid">Provincia</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating" id="select1">

                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="18" name="edad" required>
                            <label for="floatingInputGrid">Edad</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" placeholder="ingresa tu DNI" name="dni" required>
                            <label for="floatingInputGrid">D.N.I</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="floatingInputGrid" placeholder="19/08/2005" name="nacimiento" required>
                            <label for="floatingInputGrid">Fecha de Nacimiento</label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="MikeNoble@gmail.com" name="correo" required>
                                <label for="floatingInputGrid">Correo Electronico</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="1134554299" name="telefono" required>
                                <label for="floatingInputGrid">Numero de telefono</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" name="genero" required>
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                    <option value="especificar">Tanque T-34</option>
                                </select>
                                <label for="floatingSelectGrid">Genero</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid" placeholder="Hipertension" name="enfermedad" required>
                                <label for="floatingInputGrid">Enfermedades</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="d-grid gap-2">
            <button class="btn btn-dark" type="submit">Enviar Datos</button>
        </div>
    </form>
</div>
<link rel="stylesheet" href="css/mercadolibre.css">
<?php if (isset($_SESSION['usu'])) { ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="margin-top: 10px;">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="divisiones_lista.php?pagina=1">Mercado Libre</a></li>
                <li class="breadcrumb-item" aria-current="page">Publicar</li>
            </ol>
        </nav>
    </div>
    <br>
    <div class="container">
        <table class="table table-dark table-striped">
            <tr>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Opcion</th>
            </tr>
        </table>
    </div>
<?php } ?>
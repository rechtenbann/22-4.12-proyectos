<div style="color:black;"> <?php
                            if ($dou[0]["division"] == "Ejercito") {
                                $a = "Ejercito";
                            }
                            if ($dou[0]["division"] == "Armada") {
                                $a = "Armada";
                            }
                            if ($dou[0]["division"] == "Fuerza_Aérea") {
                                $a = "Fuerza Aérea";
                            }
                            ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Rangos <?php echo $a  ?></li>
        </ol>
    </nav>


    <h1 style=" text-align: center; font-size:100px;"><?php echo $a  ?></h1>
    <?php for ($i = 0; $i < count($dou); $i++) { ?>

        <?php if ($i == 0 || $i % 5 == 0) {
            if ($i != 0) { ?>
</div>

<?php } ?>
<?php if ($dou[$i]["Oficial_Suboficial"] == "Suboficial") {
                $o = "suboficial"; ?>
<?php } ?>

<div class="rangos1234 " style="display:flex; "> <?php } ?>
<div class="card-group" style="width: 320px;   padding-bottom: 20px;">
    <div class="card border-primary mb-3">
        <?php if ($dou[$i]["Oficial_Suboficial"] == "Oficial") {
            $o = "oficial"; ?>
        <?php } ?>
        <div style="text-align:center ;">
            <?php require_once "includes/config.php";
            $py = $dou[$i]['rango'];
            echo  '<img style=" margin-top: 40px; width:200px; height:150px;" src="img/rangos/' . $dou[$i]['division'] . '/' . $o . '/' . $py . '.png" > '; ?>
        </div>
        <div class="card-body">

            <h5 class="card-title"><strong><?php if ($dou[$i]["Oficial_Suboficial"] == "Suboficial") {
                                                $o = "suboficial"; ?>
                        <h1>Suboficial</h1> <?php } ?> <?php if ($dou[$i]["Oficial_Suboficial"] == "Oficial") {
                                                            $o = "oficial"; ?>
                        <h1>Oficial</h1> <?php } ?>
                </strong></h5>

            <p class="card-text">Rango : <?php echo $dou[$i]["rango"]; ?></p>
        </div>
    </div>
</div>
<br> <?php } ?>
</div>
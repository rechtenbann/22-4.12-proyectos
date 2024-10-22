<nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-top: 10px; margin-left: 10px;">
            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Autoridades</li>
        </ol>
    </nav>
<?php for ($i=0;$i < count($dou);$i++) { ?> 
    
    <?php if($i == 0 || $i % 5 == 0){ if($i != 0){ ?> </div> 
      
      <?php } ?>
   
        
     <div class="rangos1234 " style="display:flex; " > <?php } ?> 
     <div class="card-group" style="width: 320px; padding-bottom: 50px;">
          <div class="card border-primary mb-3">
         
          <?php require_once "includes/config.php"; $py=$dou[$i]['IDtrabajadores']; echo  '<img style=" margin-top: 40px; height:200px;" src="img/autoridades/'.$py .'.jpg" > '; ?>
              <div class="card-body">
  
              <h5 class="card-title"><strong><?php echo  $dou[$i]['apellidopat'] . "  " . $dou[$i]['apellidomat'] . "  " . $dou[$i]['nombre'] ?></strong></h5>
              <h5 class="card-title"><?php echo $dou[$i]['cargo'] ?></h5>
              <p class="card-text"><small class="text-muted">Fecha al asumir: <?php echo$dou[$i]['fecha'] ?></small></p>
              </div>
          </div>
      </div>
       <br> <?php } ?> </div>
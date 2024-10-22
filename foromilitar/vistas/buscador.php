<link rel="stylesheet" href="css/mercadolibre.css">
<?php
if (count($dou) > 0 && count($dou1)>0){
 foreach ($dou as $pe){




?>
 <div class="container">
    <div class="row">
      <div class="card mb-3">
        <div class="single-product">
          
          <div class="product-f-image">
          <img src="<?php echo 'img/' . $pe['id_arma'] . '/principal.jpg' ?>"  style="width: 1200px; height:720px">
            <div class="product-hover">
              <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Agregar al carrito</a>
            </div>
          </div>
        </div>
<div class="card-body">
          <h5 class="card-title"><?php echo $pe['nombre'] ?></h5>
          <p class="card-text"><?php echo $pe['descripcion'] ?></p>
          <p class="card-text">Precio: <?php echo $pe['precio'] ?></p>
        
          <button type="button" class="btn btn-outline-success">Leer mas</button>
          <button type="button" class="btn btn-outline-success">Comprar</button>
        
          
        </div>
        </div>
    </div>
  </div>
        <?php   }
        
      foreach($dou1 as $pe2){
      $py=$pe2['id']; 
      $po=$pe2['tipo'];?>
      
      
        <div class="container">
        <div class="row">
          <div class="card mb-3">
            <div class="single-product">
              
              <div class="product-f-image">
             <img class="card-img-top" alt="..." <?php echo 'src="img/armas/'.$po.'/'.$py .'.jpg"';?> >
                <div class="product-hover">
                  
                </div>
              </div>
            </div>
    <div class="card-body">
              <h5 class="card-title"><?php echo $pe2['arma'] ?></h5>
              <p class="card-text"><?php echo $pe2['info'] ?></p>
              <p class="card-text">Precio: <?php echo $pe2['peso'] ?></p>
          
              <a href="armas2.php?id=<?php echo $py ?>" class="btn btn-outline-dark">Leer mas >></a>

            
              
            </div>
            </div>
        </div>
      </div>


<?php
      }}
      else if(count($dou) > 0 && count($dou1)==0){ 
      foreach ($dou as $pe){




?>
 <div class="container">
    <div class="row">
      <div class="card mb-3">
        <div class="single-product">
          
          <div class="product-f-image">
          <img src="<?php echo 'img/' . $pe['id_arma'] . '/principal.jpg' ?>"  style="width: 1200px; height:720px">
            <div class="product-hover">
              <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Agregar al carrito</a>
            </div>
          </div>
        </div>
<div class="card-body">
          <h5 class="card-title"><?php echo $pe['nombre'] ?></h5>
          <p class="card-text"><?php echo $pe['descripcion'] ?></p>
          <p class="card-text">Precio: <?php echo $pe['precio'] ?></p>
       
          <button type="button" class="btn btn-outline-success">Leer mas</button>
          <button type="button" class="btn btn-outline-success">Comprar</button>
        
          
        </div>
        </div>
    </div>
  </div>
        <?php   }


       }
      else if(count($dou) == 0 && count($dou1)>0){
        foreach($dou1 as $pe2){
          $py=$pe2['id'];
          $po=$pe2['tipo']; ?>
            <div class="container">
            <div class="row">
              <div class="card mb-3">
                <div class="single-product">
                  
                  <div class="product-f-image">
                 <img class="card-img-top" alt="..." <?php echo 'src="img/armas/'.$po.'/'.$py .'.jpg"';?> >
                    <div class="product-hover">
                      
                    </div>
                  </div>
                </div>
        <div class="card-body">
                  <h5 class="card-title"><?php echo $pe2['arma'] ?></h5>
                  <p class="card-text"><?php echo $pe2['info'] ?></p>
                  <p class="card-text">Precio: <?php echo $pe2['peso'] ?></p>
                  <a href="armas2.php?id=<?php echo $py; ?>" class="btn btn-outline-dark">Leer mas >></a>




            
                
                  
                </div>
                </div>
            </div>
          </div>
    
    
    <?php
          }
      }
        else {
            ?>
<div class="container">
    <div class="card border-danger mb-3" style="max-width: 1200px; width:1000px">
    
    <div class="col-md-8">
                <div class="card-body" style=" ">
                    <h4 class="card-title" style="text-align:cente;" >No se encontraron resultados de la busqueda (<b><?php echo $busqueda;?></b>)</h4>
                    <h5 class="card-text"><strong> Sugerencias: </strong></h5><br>
                    <ul>
                    <li><p class="card-text">Asegúrate de que todas las palabras estén escritas correctamente.</p></li>
                    <li><p class="card-text">Prueba diferentes palabras clave.</p></li>
                    <li><p class="card-text">Prueba palabras clave más generales.</p></li>

                    </ul>
                    <a href="index.php"><button type="button" class="btn btn-primary">Volver al inicio</button></a>
                </div>
        </div>
            </div>
        </div>
            
       <?php  } ?>
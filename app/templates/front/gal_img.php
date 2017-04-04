<?php ob_start() ?>
    <section id="section">
          <h2 class="titulo demoHeaders" >GALERÍA DE IMÀGENES</h2>
          <div id='accordion'>
  <?php 
    /*echo "llista<br>";
echo "<pre>";
    print_r($imgs);
echo "</pre>";*/
$imgs = array_reverse($imgs);
foreach ($imgs as $key => $value) {
      $cat = explode("/", $key);
      $titol="<h3>".$cat[1]."</h3>";
      $titol = strtoupper($titol);
        
        
      if(is_array($value)){ 
        if(count($value)>2){
        echo $titol;
        echo "<div style='height:auto'>";
        echo "<ul>";
          foreach ($value as $clau => $valor){
              if (strlen($valor)>2){
              ?>
            <li>
              <a class="gal" href="<?php echo $key."/".$valor?>" data-lightbox="<?php echo $key ?>">
                <img style="width:300px" src="<?php echo $key."/".$valor?>">
             </a>
             </li>
            <?php
            }
          }
        echo "</ul>";
        }
      }      
        echo "</div>";

        
    }
  ?>
      </div>
    </section>
<?php $contenido = ob_get_clean() ?>
<?php include 'layaout.php' ?>
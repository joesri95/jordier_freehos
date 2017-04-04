<?php 
    ob_start();
    $i=0;
                       
?>
    <section id="tienda">
        <article>
            <div class="grid">
               <h1>PRODUCTES:</h1>
               <ul>
                   <?php foreach($idCat as $key => $valor ) :?>
                   <div>
                    <h2>
                        <?php 
                        if(!empty($product[$i]))
                       echo $valor['nom_cat'];?>
                    </h2><br>
                       
                        <?php foreach($product[$i] as $key => $val):?>
                    <li>
                        <figure class="effect">
                            <img alt="<?php echo $val['nomProducte']?>" src="<?php echo $val['imagen']?>">
                            <figcaption>
                                <h2><span><?php echo $val['nomProducte'];$id=$val['idProducte'];?></span></h2>
                                <p><?php echo $val['descripcioProducte']?><a href="index.php?ctl=carrito&id=<?=$id?>"><?php echo $val['preu'];?>€ comprar</a></p>
                            </figcaption>
                        </figure>
                    </li>
                    
                    <?php endforeach;?>
                     <?php $i++;?>
                    </div> 
                    <?php endforeach;?>
                </ul>
            </div>
        </article>
    </section>
<?php 
    $contenido = ob_get_clean();
    include 'layaout.php';
 ?>

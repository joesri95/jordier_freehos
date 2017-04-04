<?php ob_start();
echo $msg;?>
<section id="section">
<h2>LListar Productes</h2>
<table style="align-content: center;margin: auto;">
     <tr style="margin: 2%">
         <th style="margin: 5%">ID</th>
         <th style="margin: 5%">NOM PRODUCTE</th>
         <th style="margin: 5%">DESCRIPCIO</th>
         <th style="margin: 5%">PREU</th>
         <th style="margin: 5%">STOCK</th>
         <th style="margin: 5%">CATEGORIA</th>
         <th style="margin: 5%">IMAGEN</th>
         <th style="margin: 5%"><a class="fa fa-plus fa-lg" href="index.php?ctl=alta_product"></a></th>
     </tr>
<?php
foreach ($params as $value):?>
<tr>
         <td style="margin: 2%">
            <?php echo $value['idProducte']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['nomProducte']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['descripcioProducte']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['preu']."€"?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['stock']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['idcat']?>
         </td>
         <td style="margin: 2%">
            <img style="width:150px" alt="<?php echo $value['nomProducte']?>" src="<?php echo $value['imagen']?>">
         </td>
         <td style="margin: 2%">
             <a class="fa fa-pencil-square-o fa-lg" href="index.php?ctl=modificar_product&id=<?=$value['idProducte']?>" aria-hidden="true"></a>
         </td>
         <td style="margin: 2%">
             <a class="fa fa-trash fa-lg" href="index.php?ctl=eliminar_product&id=<?=$value['idProducte']?>" aria-hidden="true"></a>
         </td>
     </tr>
     
<?php endforeach;?>
</table>
<a href="index.php?ctl=inicio"><h3>Inicio</h3></a>
</section>
<?php $contenido_back = ob_get_clean()?>
<?php include 'layout.php'?>
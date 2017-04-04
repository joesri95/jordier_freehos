<?php ob_start();
?>
<section id="section">
<h2>LListar Productes</h2>
<table style="align-content: center;margin: auto;">
     <tr style="margin: 2%">
         <th style="margin: 5%">IDCOMANDA</th>
         <th style="margin: 5%">IDUSUARI</th>
         <th style="margin: 5%">NOM PRODUCTES</th>
         <th style="margin: 5%">DESCRIPCIO</th>
         <th style="margin: 5%">PREU</th>
         <th style="margin: 5%">QUANTITAT</th>
         <th style="margin: 5%">IMAGEN</th>
     </tr>
<?php
foreach ($prod as $value):?>
<tr>
         <td style="margin: 2%">
            <?php echo $value['idComanda']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['idUsuari']?>
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
            <?php echo $value['quantitat']?>
         </td>
         <td style="margin: 2%">
            <img style="width:150px" alt="<?php echo $value['nomProducte']?>" src="<?php echo $value['imagen']?>">
         </td>
     </tr>
     
<?php endforeach;?>
</table>
<a href="index.php?ctl=inicio"><h3>Inicio</h3></a>
</section>
<?php $contenido_back = ob_get_clean()?>
<?php include 'layout.php'?>
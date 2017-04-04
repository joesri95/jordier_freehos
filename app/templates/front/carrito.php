<?php ob_start();?>
<section id="section">
<h2>LListar Productes Carrito</h2>
<table style="align-content: center; margin: auto;">
     <tr style="margin: 2%">
        <th style="margin: 5%">Nº PRODUCTO</th>
         <th style="margin: 5%">IMAGEN</th>
         <th style="margin: 5%">ID</th>
         <th style="margin: 5%">NOM PRODUCTE</th>
         <th style="margin: 5%">DESCRIPCIO</th>
         <th style="margin: 5%">PREU</th>
         <th style="margin: 5%">QUANTITAT</th>
         <th style="margin: 5%"><a class="fa fa-plus fa-lg" href="index.php?ctl=tienda"></a></th>
     </tr>
     <?=$pos=0; ?>
<?php foreach ($_SESSION["producte"] as $value):?>
    <tr>
        <td style="margin: 2%; align-content:center">
            <h4><?php echo $pos;?></h4>
        </td>    
         <td style="margin: 2%">
            <img style="width:150px" alt="<?php echo $value['nom']?>" src="<?php echo $value['foto']?>">
         </td>
         <td style="margin: 2%">
            <?php echo $value['id']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['nom']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['descripcio']?>
         </td>
         <td style="margin: 2%">
            <?php echo $value['preu']."€"?>
         </td>
         <td style="margin: 2%">
            
               <select name="cant+<?php echo $value['id']?>" id="des2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>    
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>    
           </select>
           
         </td>
         <td style="margin: 2%">
             <a class="fa fa-trash fa-lg" href="index.php?ctl=elimProdCarro&pos=<?=$pos?>"></a>
         </td>
     </tr>     
<?php $pos++; endforeach;?>
   
    <tr>
        <td style="font-size:bold">TOTAL</td>
        <td style="font-size:bold"><?php echo $_SESSION['preu'];?></td>
    </tr>
</table>
<form method="post" action="index.php?ctl=confirmar">
           <input style="width:200px;" type="submit" value="Asigna Quantitats &amp Confirmar" >
    </form>
<h2><a href="index.php?ctl=cancelarCarro">Cancelar compra</a></h2>
<h2><a href="index.php?ctl=confirmar">Confirmar compra</a></h2>
</section>
<?php $contenido = ob_get_clean()?>
<?php include 'layaout.php';?>
<?php ob_start();?>

<section id="section">
<form class="form" action="index.php?ctl=alta_categoria" method="post" name="login">
    <ul class="ul">
        <li class="li">
            <label for="nom_cat">Nom:</label>
            <input type="text" name="nom_cat" placeholder="nombre categoria" required/>
        </li>
        <li class="li">
            <label for="descrip_cat">Descripció:</label>
            <input type="text" name="descrip_cat" placeholder="Descripció" required/>
        </li>
        <li class="li">
    	    <button class="submit" type="submit" name="submit">Donar alta</button>
        </li>	
    </ul>
</form>
<a href="index.php?ctl=llistar_cat">LLISTAR CATEGORIES</a>
</section>
<?php $contenido_back = ob_get_clean() ?>
<?php include 'layout.php' ?>


<?php ob_start() ?>
<section id="section">
<form class="form" action="index.php?ctl=modificar_cat" method="post" name="login">
    <ul class="ul">
        <li class="li">
            <label for="nomnou"><h4>Nou nom:</h4></label>
            <input type="text" name="nomnou" placeholder="nombre de la nueva categoria" required value="<?=$params[0]["nom_cat"] ?>"/>
        </li>
        <li class="li">
            <label for="descripnou"><h4>Nova Descripció:</h4></label>
            <input type="text" name="descripnou" placeholder="Descripció de la nova categoria" required value="<?=$params[0]["descrip_cat"] ?>"/>
        </li>
        <li>
            <label for="id"><h4>Id</h4></label>
            <input type="hidden" name="id" value="<?=$params[0]["idCategoria"] ?>"/>
        </li>
        <li class="li">
    	    <button class="submit" type="submit" name="submit">Modificar categoria</button>
        </li>	
    </ul>
</form>
</section>
<?php $contenido_back = ob_get_clean() ?>
<?php include 'layout.php' ?>

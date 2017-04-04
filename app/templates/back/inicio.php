<?php ob_start() ?>
	<section id="section">
	<h2>Elige una opcion:</h2>
	<ul id="back">
		<li>
			<h3>Categorias</h3>
			<ul>
				<li><a href="index.php?ctl=alta_categoria"><h4>Alta</h4></a></li>
				<li><a href="index.php?ctl=llistar_cat"><h4>Llistar</h4></a></li>
			</ul>
		</li>
		<li>
			<h3>Producte</h3>
			<ul>
				<li><a href="index.php?ctl=alta_product"><h4>Alta</h4></a></li>
				<li><a href="index.php?ctl=llistar_product"><h4>Llistar</h4></a></li>
			</ul>
		</li>
		<li>
			<a href="#"><h3>Usuaris</h3></a>
			<ul>
				<li><a href="index.php?ctl=alta_user"><h4>Alta</h4></a></li>
				<li><a href="index.php?ctl=llistar_user"><h4>Llistar</h4></a></li>
			</ul>
		</li>
		<li>
			<a href="index.php?ctl=comanda"><h3>Comandes</h3></a>
		</li>
	</ul>
	<script type="text/javascript">
            function txt(esto){
	vista=document.getElementById(esto).style.display;
	if (vista=='none')
		vista='block';
	else
		vista='none';

	document.getElementById(esto).style.display = vista;
}
        </script>
</section>
<?php $contenido_back = ob_get_clean() ?>

    <?php include 'layout.php' ?>
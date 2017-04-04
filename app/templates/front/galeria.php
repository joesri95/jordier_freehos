	 <?php ob_start() ?>
    <section id="section">
          <article>
              <a href="index.php?ctl=image"><h2>Imatges</h2></a>
          </article>
          <article>
               <a href="index.php?ctl=video"><h2>Videos &amp; Audios</h2></a>
          </article>
    </section>
    <?php $contenido = ob_get_clean() ?>

    <?php include 'layaout.php' ?>
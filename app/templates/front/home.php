 <?php ob_start() ?>
<section id="section">
           
        <div id="slider">
            <ul id="ul_slide">
              <li class="slide_Image">
                 <img id="slide_img" src="imagenes/playa/Cala-d-Hort-Ibiza.jpg" alt="Cala D'hort, puesta de sol" />
                 <div class="introtext">
                  <h2>IBIZA</h2>
                  <p>Una pequeña isla conocida por sus preciosas playas, por las mejores discotecas del mundo.</p>
                </div>  
              </li>
              <li class="slide_Image">
                  <img src="imagenes/vistas/ibiza.jpg" alt="Sunset" />
                  <div class="introtext">
                      <h2>¿PERO SOLO ES PLAYA Y FIESTA?</h2>
                      <p>Desafortunadamente la gente solo conoce Ibiza, por sus playas, y las fiestas de las discotecas, pero lo que no se conoce es la mejor parte de Ibiza que son los preciosos paisajes que esconde, su cultura, su folklore,sus platos tipicos.</p>
                  </div>
              </li>
             <li class="clear featured_slide_Image">

              </li>
            </ul>
          </div>    
          <h2>TITLE</h2>
        <p>Lorem ipsum Eiusmod amet minim eiusmod adipisicing sunt qui eu Duis ut dolor anim officia occaecat amet eu culpa dolor exercitation dolore laborum adipisicing ullamco veniam in nulla elit exercitation exercitation ex qui Excepteur culpa fugiat enim fugiat anim et laboris in culpa Ut ex aliqua ullamco dolor velit sint ea consequat dolor amet nulla ullamco aliquip amet cupidatat esse ad ea sit sed elit culpa eiusmod reprehenderit aute veniam Excepteur nostrud nulla cupidatat non adipisicing consequat ut do culpa nisi irure id dolore id et ut labore eu cupidatat elit in non sint occaecat nostrud ad Excepteur sunt nulla qui amet consequat dolor reprehenderit minim elit cillum commodo est Excepteur eiusmod velit reprehenderit Ut laborum magna esse nostrud sed sint nulla incididunt ullamco in magna ea sunt deserunt consectetur dolore quis reprehenderit commodo quis est irure dolor est ut ut in aliquip nulla quis laborum magna velit laboris commodo enim qui ut ex voluptate enim nisi ad commodo ea aute veniam consectetur officia ex esse fugiat amet proident eiusmod quis in in dolore Duis dolor ut sunt aute esse tempor mollit dolor voluptate dolore magna commodo Duis reprehenderit.</p>
    <section class="artic">
        <article class="sec">
            <h3>FOLKLORE</h3>
            <img src="imagenes/cultura/ball_pages.jpg">
            <p>LorLorem ipsum Occaecat exercitation cupidatat labore non est ut pariatur esse occaecat ut id eiusmod commodo quis sit occaecat aliquip et sit magna exercitation voluptate minim sunt sed proident.</p>
        </article>
        <article class="sec">
            <h3>GASTRONOMIA</h3>
            <img src="imagenes/gastronomia/flao.jpg">
            <p>LorLorem ipsum Occaecat exercitation cupidatat labore non est ut pariatur esse occaecat ut id eiusmod commodo quis sit occaecat aliquip et sit magna exercitation voluptate minim sunt sed proident.</p>
        </article>
        <article class="sec">
            <h3>ARTESANIA</h3>
            <img src="imagenes/cultura/color.jpg">
            <p>LorLorem ipsum Occaecat exercitation cupidatat labore non est ut pariatur esse occaecat ut id eiusmod commodo quis sit occaecat aliquip et sit magna exercitation voluptate minim sunt sed proident.</p>
        </article>
    </section>
    </section>
     <?php $contenido = ob_get_clean() ?>

    <?php include 'layaout.php' ?>
<?php ob_start() ?>
    <section id="section">
        <div id="tabs">
         <ul>
             <li><a href="#videos">VIDEOS</a></li>
             <li><a href="#audios">AUDIOS</a></li>
         </ul>
          <div id="videos">
               <h2>Videos</h2>
               <div>
                   <h3>Artesanos de Ibiza</h3>
                    <video width="560" height="315" controls>
                       <source src="../../../web/multimedia/Artesanos_de_Ibiza.mp4" type="video/mp4"/>
                        
                    </video>
                       <h3>Artesania Ibicenca</h3>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Ojpgj9HQdLM" frameborder="0" allowfullscreen></iframe>
                        <h3>Ball Pages i les tradicions eivissenques</h3>
                        <iframe src="https://player.vimeo.com/video/76692402" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <h3>Moda adlib</h3>
                        <iframe frameborder="0" width="560" height="315" src="//www.dailymotion.com/embed/video/x11afbx" allowfullscreen></iframe>
                   
               </div>
           </div>
          <div id="audios">
               <h2>Audios</h2>
               <div>
                       <h3>Flors de baladre</h3>
                        <audio controls>
                            <source src="../../../web/multimedia/flors%20de%20baladre.mp3" type="audio/mpeg"/>
                        </audio>
                       <h3>Eivissa sa nostra Illa</h3>
                        <audio controls>
                            <source src="../../../web/multimedia/IBIZA%20-%20EIVISSA%20SA%20NOSTRA%20ILLA.mp3" type="audio/mpeg" controls/>
                        </audio>
                       <h3>Sa nostra ciutat d'Eivissa</h3>
                        <audio controls>
                            <source src="../../../web/multimedia/UC%20-%20Sa%20nostra%20ciutat%20dEivissa.mp3" type="audio/mpeg"/>
                        </audio>
               </div>
          </div>
    </div>
          
           
    </section>
    <?php $contenido = ob_get_clean() ?>

    <?php include 'layaout.php' ?>
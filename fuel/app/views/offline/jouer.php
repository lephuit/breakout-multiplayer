<div class="hero-unit">
	<h1 id="titre">Comment vous jouez ?</h1>

	<p class="padding" id="boutons">
		<div id="aCacher">
			<button class="btn btn-large span5" id="btn-souris" onclick="demarer('souris')">Avec la souris</button>
			<button class="btn btn-large span5" id="btn-touches" onclick="demarer('touches')">Avec les touches</button>
		</div>
		<div id="rejouer" style="display:none">
			<button class="btn btn-large span10 low-margin" onclick="rejouer()">Rejouer</button>
		</div>
	</p>

  <p>
    <h4 class="center span10" id="notification"> Êtes-vous prêt ?</h4>
  </p>

	<script type="text/javascript">

          document.addEventListener('keyup', function(evt) {

            if(evt.keyCode == 80)
            {

              if (est_en_pause)
              {

                restart();

              } else {

                mettreEnPause();

              }
            }

          });

        </script>

	<p class="padding">
			<canvas id="monCanvas" width="800" height="300" class="img-polaroid">
            	Votre navigateur <strong>n'est pas compatible</strong> avec CasseBriqueOnline. Veuillez <a href="http://browsehappy.com/">mettre à jour votre navigateur</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">activez Google Chrome</a> pour utiliser ce site de façon optimale.
	</canvas>
	</p>

	<p id="boutons">
		<div class="row low-margin">
			<a class="btn btn-large span3" href="javascript:restart()">START</a>
			<a class="btn btn-large span3" href="javascript:changeVitesseBoule('+')"><i class="icon-arrow-up"></i></a>
			<a class="btn btn-large span3" href="javascript:mettreEnPause()">PAUSE</a>
		</div>
		<div class="row low-margin">
		<a class="btn btn-large span3" href="javascript:checkDeplaButtons('left')"><i class="icon-arrow-left"></i></a>
			<a class="btn btn-large span3" href="javascript:changeVitesseBoule()"><i class="icon-arrow-down"></i></a>
			<a class="btn btn-large span3" href="javascript:checkDeplaButtons()"><i class="icon-arrow-right"></i></a>
		</div>
	</p>
</div>

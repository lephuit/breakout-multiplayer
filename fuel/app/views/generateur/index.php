<div class="hero-unit">
	<h1 id="titre">Générateur de niveaux</h1>

	<p class="padding" id="boutons">
		<button class="btn btn-large span10 low-margin" onclick="rejouer()">Réinitialiser</button>
	</p>
  <p>
    <h4 class="center span10" id="notification"></h4>
  </p>

  	<script type="text/javascript">

          document.addEventListener('keyup', function(evt) {

            if(evt.keyCode == 80)
            {

              if (est_en_pause)
              {

                restart();

              } else {

                pauser();

              }
            }

          });

        </script>

	<p class="padding">
		<canvas id="monCanvas" width="800" height="300" class="img-polaroid afficherCurseur">
            	Votre navigateur <strong>n'est pas compatible</strong> avec CasseBriqueOnline. Veuillez <a href="http://browsehappy.com/">mettre à jour votre navigateur</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">activez Google Chrome</a> pour utiliser ce site de façon optimale.
	</canvas>
	</p>

	<p id="boutons">
		<div class="row low-margin">
			<div class="btn btn-large span3">Briques par lignes<input type="number" id="briques_lignes" value="8" max="10" min="4"/></div>
			<div class="btn btn-large span3">Panel de couleurs<select id="panel" onchange="javascript:changerCouleur()"><option value="0">Rouge</option><option value="1">Orange</option><option value="2">Bleu</option><option value="3">Vert</option></select></div>
			<div class="btn btn-large span3">Nom du niveau<input type="text" id="nom_niveau" placeHolder="Mon niveau"/></div>
		</div>
		<div class="row low-margin">
			<div class="btn btn-large span10" onclick="javascript:sauvegarder()">Sauvegarder</div>
		</div>
	</p>
</div>

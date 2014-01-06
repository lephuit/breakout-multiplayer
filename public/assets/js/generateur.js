var canvas                   = document.getElementById('monCanvas');
var context                  = canvas.getContext('2d');
var tableau_briques;
var brique_couleurs          = new Array();
brique_couleurs[0]           = ["#8F0037", "#A52959", "#DC0055", "#EE3B80", "#EE6B9E"];
brique_couleurs[1]           = ["#A64500", "#BF6B30", "#FF6A00", "#FF8F40", "#F56E8B"];
brique_couleurs[2]           = ["#00685A", "#1E786C", "#00A08A", "#34D0BA", "#5DD0C0"];
brique_couleurs[3]           = ["#329000", "#55A62A", "#4DDE00", "#7AEE3C", "#99EE6B"];
var nombre_lignes            = 5;
var nombre_briques_par_ligne = 8;
var panel_couleurs           = brique_couleurs[0];
var brique_largeur           = 96;
var brique_hauteur           = 20;
var brique_espace            = 5;

/* NIVEAU */

var tableau_briques_niveau = new Array(nombre_lignes);

for (var j=0; j < nombre_lignes; j++) {
  tableau_briques_niveau[j]  = new Array(nombre_briques_par_ligne);
}

for (var i=0; i < tableau_briques_niveau.length; i++) {
  for (var j=0; j < tableau_briques_niveau[i].length; j++) {
    tableau_briques_niveau[i][j] = 0;
  }
}

function getMousePos(canvas, evt) {
  var rect = canvas.getBoundingClientRect();
  return {
    click: evt.which,
    x: evt.clientX - rect.left,
    y: evt.clientY - rect.top
  };
}

canvas.addEventListener('click', function(evt) {

  var pos = getMousePos(canvas, evt);

  var ligneY = Math.floor(pos.y/(brique_hauteur+brique_espace));
  var ligneX = Math.floor(pos.x/(brique_largeur+brique_espace));

  if(tableau_briques_niveau[ligneY][ligneX] < 2) {

    tableau_briques_niveau[ligneY][ligneX] = tableau_briques_niveau[ligneY][ligneX] + 1;
    afficherBriques();

  }

})

function sauvegarder() {

  if (document.getElementById('nom_niveau').value == '')
    {

      alert('Vous devez donner un nom à votre niveau');

    } else {

      var ligne_1 = '[';
      var ligne_2 = '[';
      var ligne_3 = '[';
      var ligne_4 = '[';
      var ligne_5 = '[';

      for (var j=0; j < tableau_briques_niveau[0].length; j++) {
        if(j == tableau_briques_niveau[0].length - 1) {
          ligne_1 += tableau_briques_niveau[0][j];
        } else {
          ligne_1 += tableau_briques_niveau[0][j] + ',';
        }
      }
      ligne_1 += ']';

      for (var j=0; j < tableau_briques_niveau[1].length; j++) {
        if(j == tableau_briques_niveau[1].length - 1) {
          ligne_2 += tableau_briques_niveau[1][j];
        } else {
          ligne_2 += tableau_briques_niveau[1][j] + ',';
        }
      }
      ligne_2 += ']';

      for (var j=0; j < tableau_briques_niveau[2].length; j++) {
        if(j == tableau_briques_niveau[2].length - 1) {
          ligne_3 += tableau_briques_niveau[2][j];
        } else {
          ligne_3 += tableau_briques_niveau[2][j] + ',';
        }        
      }
      ligne_3 += ']';

      for (var j=0; j < tableau_briques_niveau[3].length; j++) {
        if(j == tableau_briques_niveau[3].length - 1) {
          ligne_4 += tableau_briques_niveau[3][j];
        } else {
          ligne_4 += tableau_briques_niveau[3][j] + ',';
        }
      }
      ligne_4 += ']';

      for (var j=0; j < tableau_briques_niveau[4].length; j++) {
        if(j == tableau_briques_niveau[4].length - 1) {
          ligne_5 += tableau_briques_niveau[4][j];
        } else {
          ligne_5 += tableau_briques_niveau[4][j] + ',';
        }
      }
      ligne_5 += ']';

      $.ajax({

      type: "GET",
      url: "http://localhost/CasseBriqueOnline/public/niveaux/create.json?couleur=" + document.getElementById('panel').value + "&nom=" + document.getElementById('nom_niveau').value + "&ligne_1=" + ligne_1 + "&ligne_2=" + ligne_2 + "&ligne_3=" + ligne_3 + "&ligne_4=" + ligne_4 + "&ligne_5=" + ligne_5,
      success:function(data){

        if (data == "non") {

          document.getElementById('notification').innerHTML = document.getElementById('notification').innerHTML + '</br> Vous devez vous connecter pour enregistrer ce niveau!';
        
        } else {

         document.getElementById('notification').innerHTML = document.getElementById('notification').innerHTML + '</br>' + data;

       }
      }
    });
  }
}

function changerCouleur() {

  var couleur = document.getElementById('panel').value;
  panel_couleurs = brique_couleurs[couleur]
  afficherBriques();

}

function afficherBriques() {
  
  for (var i=0; i < tableau_briques_niveau.length; i++) {

    context.fillStyle = panel_couleurs[i+1];

    for (var j=0; j < tableau_briques_niveau[i].length; j++) {

      if (tableau_briques_niveau[i][j] == 1) {

        context.fillStyle = panel_couleurs[i];
        context.fillRect((j*(brique_largeur+brique_espace)),(i*(brique_hauteur+brique_espace)),brique_largeur,brique_hauteur);
        win = 0;

      }

      if (tableau_briques_niveau[i][j] == 2) {

        context.fillStyle = /*panel_couleurs[0]*/'grey';
        context.fillRect((j*(brique_largeur+brique_espace)),(i*(brique_hauteur+brique_espace)),brique_largeur,brique_hauteur);
        win = 0;
        context.fill();

      }
    }
  }
}
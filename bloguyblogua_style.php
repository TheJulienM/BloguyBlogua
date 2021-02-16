
<?php


require_once "config.php";


session_start();
 



header("Content-type: text/css; charset: UTF-8");

  
  
$resultat = mysqli_query($link, "SELECT * FROM perso_article");


while($donnees = mysqli_fetch_assoc($resultat))
{
	$couleur_article=$donnees['couleur_article'];
        $couleur_police_article=$donnees['couleur_police_article'];
        $police_article=$donnees['police_article'];
        
        
	
	
}

$resultat = mysqli_query($link, "SELECT * FROM perso_blog");


while($donnees = mysqli_fetch_assoc($resultat)){

	
        $couleur_blog=$donnees['couleur_blog'];
        $couleur_header_footer=$donnees['couleur_header_footer'];
        $police_titre=$donnees['police_titre'];
        
	
	
}


?>



/* Fiche CSS de personnalisation.php, creer_article.php, modifier_article.php, menu_article.php, modifier_blog.php */

html { 
 	height: 100%;
	
}

.body_classique {  /*style des bodys sauf celui de la page du blog */
 	min-height: 100%;
 	margin: 0;
 	padding: 0;
	background: #CEC6C2;
	background: -moz-linear-gradient(45deg, #CEC6C2 0%, #464343 50%, #FFF8F8 100%);
	background: -webkit-linear-gradient(45deg, #CEC6C2 0%, #464343 50%, #FFF8F8 100%);
	background: linear-gradient(45deg, #CEC6C2 0%, #464343 50%, #FFF8F8 100%);
        overflow : hidden; /* supprime la barre de défilement horizontal */
}

#body_blog {  /*style du body du blog */
 	min-height: 100%;
 	margin: 0;
 	padding: 0;
	background: <?php echo $couleur_blog;?>;

}

#header_blog{ /* style du header du blog */
	background-color: <?php echo $couleur_header_footer;?>;
	border: 2px solid black;
	position: fixed;
	margin: auto;
	width: 100%; 
    height: 80px;
    font-family: "Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 10px;
	top: 0;
	left: 0;
	right: 0;
	text-align: center;
}

#logo{
	height: 79.5px;
    width: 79.5px;    
    display: block;
    margin-left: 400px;
    margin-right: 30px;

}

.header_menu{ /* style des headers "BLOGUY BLOGUA CORPORATION" de chaque menu */
	background-color: #FAFAFA;
	border: 2px solid black;
	margin: auto;
	width: 100%; 
    height: 50px;
    font-family: "Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 10px;
    text-align: center;
	top: 0;
	left: 0;
	right: 0;
	background: #FFFFFF;
	background: -moz-linear-gradient(top, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
	background: -webkit-linear-gradient(top, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
	background: linear-gradient(to bottom, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
}

.h1_classique{ /* style des titres des headers (soit le nom du blog pour le header_blog, et BLOGUY BLOGUA CORPORATION pour les header_menu) */
	text-shadow: 9px -4px 5px rgba(0,0,0,0.73);
        
}

#h1_blog { /* permet au titre du blog d'être au centre, le header_blog étant plus large que les header_menu */
	margin-top: -50px;
        font-family:<?php echo $police_titre;?>;
}

.article_zone{ /* style de la zone de la rédaction/modification des articles */
	position: center;
	left: 0;
	right: 0;
	margin: auto;
	margin-top: 20px;
	border: 5px solid #6B6868;
	border-radius: 15px;
	width: 1200px; 
    height: 500px;
    background-color: #F7F9F9;
    text-align: center;

}

.redac_textarea{ /* style de la textarea pour la rédaction des articles */
	resize: none;
	width: 1000px; 
    height: 400px;
    margin: auto;
    margin-top: 20px;
    background-color: #F7FDFD;
    font-family: "Times New Roman";
    border: 2px solid #C6BAB9;
	border-radius: 5px;

}

.article{ /* style des articles */
	width: 30%; 
    height: 20%;
    margin: auto;
    margin-bottom: 5%;
    margin-top: 10px;
    background-color: <?php echo $couleur_article;?>;
    color: <?php echo $couleur_police_article;?>;
    font-family: <?php echo $police_article;?>;
    border: 2px solid #C6BAB9;
	border-radius: 5px;
	word-wrap: break-word;
}

.lien_deconnect{ /* style des boutons de déconnexion */
	float: right;
	border: 2px solid #C6C6C6;
	border-radius: 10px;
	width: 110px; 
    height: 25px;
    margin-right: 10px;
    margin-top: 12px;
    background-color: #FDFCFC;
    text-align: center;

    /* l'effet de transition de zoom du bouton dure 1s */
	-webkit-transition: all 1s ease; /* Safari et Chrome */
	-moz-transition: all 1s ease; /* Firefox */

}

.lien_deconnect:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

#lien_deconnect_blog{ /* style du bouton de déconnexion du blog car margin-top différent */
	float: right;
	border: 2px solid #C6C6C6;
	border-radius: 10px;
	width: 110px; 
    height: 25px;
    margin-right: 10px;
    margin-top: 25px;
    background-color: #FDFCFC;
    text-align: center;

    /* l'effet de transition de zoom du bouton dure 1s */
	-webkit-transition: all 1s ease; /* Safari et Chrome */
	-moz-transition: all 1s ease; /* Firefox */

}

#lien_deconnect_blog:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

#label_lien_deconnect{ /* style du label du bouton de déconnexion du blog */
	float: right;
  	margin-top: 31px;
  	margin-right: 5px;
  	font-size: 12px;

}

.menu_personnalisation{ /* style du bouton vers le menu de personnalisation */
	float: left;
	border: 2px solid #C6C6C6;
	border-radius: 10px;
	width: 140px; 
    height: 25px;
   	margin-left: 10px;
    margin-top: 25px;
    background-color: #FDFCFC;
    text-align: center;

	/* l'effet de transition de zoom du bouton dure 1s */
	-webkit-transition: all 1s ease; /* Safari et Chrome */
	-moz-transition: all 1s ease; /* Firefox */

}

.menu_personnalisation:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

 #label_menu_perso{ /* style du label du bouton pour modifier le mot de passe */
    float: left;
      margin-top: 25px;
      margin-left: 10px;

}

.retour_blog{ /* style des boutons de redirection vers le blog dans les menus et sous-menus */
	float: left;
	float: left;
	border: 2px solid #C6C6C6;
	border-radius: 10px;
	width: 140px; 
    height: 25px;
   	margin-left: 10px;
    margin-top: 12px;
    background-color: #FDFCFC;
    text-align: center;

	/* l'effet de transition de zoom du bouton dure 1s */
	-webkit-transition: all 1s ease; /* Safari et Chrome */
	-moz-transition: all 1s ease; /* Firefox */

}

.retour_blog:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

.msg_accueil_menu{ /* style des messages d'accueil des menu et sous-menus */
    text-align: center;
    line-height: 40px;
    word-wrap: break-word;
    border: 3px solid black;
    border-radius: 10px;
    height:40px;
    width:1200px;
    margin :20px auto;
    background: #F2F2F2;
    background: -moz-linear-gradient(left, #F2F2F2 0%, #A3A3A3 50%, #EFEFEF 100%);
    background: -webkit-linear-gradient(left, #F2F2F2 0%, #A3A3A3 50%, #EFEFEF 100%);
    background: linear-gradient(to right, #F2F2F2 0%, #A3A3A3 50%, #EFEFEF 100%);
}

.bouton{ /* style des boutons */
    background-color: #D8D8D8;
    border-radius: 10px;
    border: 2px solid #C6C6C6;
    margin-top: 20px;
    height: 25px;

    /* l'effet de transition de zoom du bouton dure 1s */
    -webkit-transition: all 1s ease; /* Safari et Chrome */
    -moz-transition: all 1s ease; /* Firefox */
}

.bouton:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

.bouton_article{
    background-color: #FAFBFD;
    border-radius: 10px;
    border: 2px solid #C6C6C6;
    margin-top: 15px;
    height: 25px;

    
    -webkit-transition: all 1s ease; / Safari et Chrome /
    -moz-transition: all 1s ease; / Firefox */
}

.bouton_article:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}


 .div_bouton{ /* style des zone des boutons */
    border: 5px solid #6B6868;
    border-radius: 15px;
    height:40%;
    width:300px;
    margin:auto;
    text-align: center;
    background: #EAE1E1;
    background: -moz-radial-gradient(center, #EAE1E1 0%, #A4A4A4 51%, #F7F0ED 100%);
    background: -webkit-radial-gradient(center, #EAE1E1 0%, #A4A4A4 51%, #F7F0ED 100%);
    background: radial-gradient(ellipse at center, #EAE1E1 0%, #A4A4A4 51%, #F7F0ED 100%);

} 

.color_select {
  -webkit-appearance: none;
  padding: 0;
  border: none;
  border-radius: 10px;
  width: 20px;
  height: 20px;

}
.color_select::-webkit-color-swatch {
  border: none;
  border-radius: 10px;
  padding: 0;
}
.color_select::-webkit-color-swatch-wrapper {
  border: none;
  border-radius: 10px;
  padding: 0;
}
 .color_select::-moz-color-swatch {
  border: none;
  border-radius: 10px;
  padding: 0;
}
.color_select::-moz-color-swatch-wrapper {
  border: none;
  border-radius: 10px;
  padding: 0;
} 

.color_select:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.20);
	-moz-transform:scale(1.20); /* Firefox */
}

input[type="color"]::-webkit-color-swatch { /* permet de cacher le contour des input color par défaut sur Chrome*/
    border: none;
}

input[type="color"]::-moz-color-swatch { /* permet de cacher le contour des input color par défaut sur Mozilla*/
    border: none;
}

.input_text{ /* style des champs de textes */
	margin-top: 10px;
	border: 2px solid #5C5B5B;
	border-radius: 10px;
	width: 260px;
	height: 40px;

}

.color_border{ /* bordure des input type color */
    border: 2px solid #5C5B5B;
    line-height: 50px;
    border-radius: 10px;
    width: 260px;
    height: 40px;
    margin:auto;
    margin-top: 10px;
}

.selecteur_police{ /* bordure du selecteur de police d'écriture */
	border:2px solid #5C5B5B;
	border-radius: 10px;
	margin:auto;
	margin-top: 10px;
	width: 280px;
	height: 40px;
}

.bouton_police{ /* style des boutons dans creer_article.php, le margin-top devant être différent pour ces boutons avec la textarea*/
	background-color: #FAFBFD;
	border-radius: 10px;
	border: 2px solid #C6C6C6;
	margin-top: 10px;

	/* l'effet de transition de zoom du bouton dure 1s */
	-webkit-transition: all 1s ease; /* Safari et Chrome */
	-moz-transition: all 1s ease; /* Firefox */
}

.bouton_police:hover {
	/* Le bouton est grossie de 10% */
	-webkit-transform:scale(1.10);
}

footer{ /* style des footers */
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	margin:auto;
	margin-bottom: 0;
	text-align: center;
	border: 2px solid black;
	width: 100%; 
    height: 50px;
    font-family: "Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 10px;
    text-shadow: 6px 2px 2px #A9A9A9;
    background: #FFFFFF;
	background: -moz-linear-gradient(bottom, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
	background: -webkit-linear-gradient(bottom, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
	background: linear-gradient(to top, #FFFFFF 0%, #C1B4B4 50%, #6B6B6B 100%);
}

.footer_blog{ /* style du footer du blog */
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	margin:auto;
	margin-bottom: 0;
	text-align: center;
	border: 2px solid black;
	width: 100%; 
    height: 50px;
    font-family: "Nunito Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 10px;
    text-shadow: 6px 2px 2px #A9A9A9;
    background: <?php echo $couleur_header_footer;?>;
}

#image{ /* style de l'image dans le blog */
    width: 600px;
    height: 388px;
    border-radius: 15px;
    border: 3px solid black;
    
}

.image_border{ /* style des bordures de l'image du blog */
    margin: auto;
    margin-top: 10%;
    margin-bottom: 5%;
    border-radius: 15px;
    position: center;
    width: 600px;
    height: 388px;

}


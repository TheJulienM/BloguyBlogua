<?php

require_once "config.php";


session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
if(($_SESSION["username"]) !== "admin"){ 

header("location: blog.php");

}


// affiche les données
$resultat = mysqli_query($link, "SELECT * FROM perso_article");


while($donnees = mysqli_fetch_assoc($resultat))
{
	$couleur_article=$donnees['couleur_article'];
        $couleur_police_article=$donnees['couleur_police_article'];
        $police_article=$donnees['police_article'];
        
        
	
	
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Modifier style article</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<script type="text/javascript" src="input_color.js"></script>
	<meta charset="utf-8">
</head>
<body class="body_classique" onload="couleur_article(); couleur_police();">

	<header class="header_menu">
	
	<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >
   	
   	<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" > <!-- je sais pas quoi encore mettre comme lien ¯\_(ツ)_/¯ -->

	<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

   	<div class="msg_accueil_menu">
			
		Bienvenue dans l'espace de personnalisation de vos articles !
		
	</div>

    <form action="blog.php" method="post">
   	<div class="div_bouton">

   		<br>
   		</br>
   		
   		<div class="color_border">
   		<label for="clr_fond">Couleur de fond de l'article :</label>
                <input type="color" id="clr_fond" name="couleur_article" class="color_select" value="<?php echo $couleur_article;?>"><br> 
		
   		</div>

   		<div class="color_border">
   		<label for="clr_police">Couleur de la police de l'article :</label>
                <input type="color" id="clr_police" name="couleur_police_article" class="color_select" value="<?php echo $couleur_police_article;?>"><br>
   		</div>

   		<div class="selecteur_police">
   		<label for="police">Choix de la police :</label>
   		<select name="police_article" class="bouton_police" ><br>
                        <option style="display:none;"><?php echo $police_article;?>
			<option> Arial
			<option> Arial Black
			<option> Impact
			<option> Comic Sans Ms
			<option> Courrier
			<option> Times New Roman
		</select><br>
		</div>
                <input type="submit" class="bouton" name="changement_bouton" value="Valider"><br>
		<input type="button" class="bouton" value="Retour au menu des articles" onclick="document.location.href = 'menu_article.php'" ><br><br><br>

	</div>
        </form>

	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>
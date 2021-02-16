<?php
// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if(($_SESSION["username"]) !== "admin"){ 

header("location: blog.php");

}
 



?>




<!DOCTYPE html>
<html>

<head>
	<title>Menu pour modifier article</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>

<body class="body_classique">

	<header class="header_menu">
	
	<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >
   	
   	<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" > <!-- je sais pas quoi encore mettre comme lien ¯\_(ツ)_/¯ -->

	<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>	

	<div class="msg_accueil_menu">
			
		Bienvenue dans l'espace de modification de vos articles !
		Ici corriger vos erreurs diverses, d'orthographes, de conjugaison...
		
	</div>

    <form action="modifier_article.php" method="post">
	<div class="div_bouton"><br></br>

		
   		
   		
   		<label for="article_id">Modifier l'article :</label>
   		<input type="text" id="article_id" class="input_text" name="id" placeholder="Entrez un numéro d'article valide"><br><br>   
   		<input type="submit" class="bouton" name="submit_article" value="Suivant"<br> 
   		<input type="button" class="bouton" value="Retour au menu des articles" onclick="document.location.href = 'menu_article.php'" ><br><br><br>

   	</div>
        
   </form>



	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>
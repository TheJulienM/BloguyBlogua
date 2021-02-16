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



?>



<!DOCTYPE html>
<html>
<head>
	<title>Menu personnalisation</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>
<body class="body_classique">
	

	
	<header class="header_menu">

		<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >
	
		<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" >
		 
		<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>
		
		<div class="msg_accueil_menu">
			
                    Bonjour <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> !
			
                    C'est dans cet espace que tu pourras personnaliser ton blog, ajouter des articles, des photos ou encore modifier ton logo en fonction de tes goûts !
			

		</div>

		<div class="div_bouton"><br><br><br>
                    
                    <input type="button" class="bouton" value="Menu des articles" onclick="document.location.href = 'menu_article.php' "><br><br></br>
                
                    <input type="button" class="bouton" value="Modifier apparence du blog" onclick="document.location.href = 'modifier_blog.php'"><br><br><br><br><br>
                
		</div>

	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>
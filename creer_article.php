<?php

require_once "config.php";


session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



//permet l'accès uniquement a l'utilisateur admin (c'est le cas pour toute les pages de personnalisation

if(($_SESSION["username"]) !== "admin"){ 

header("location: blog.php");

}


//Si article ni vide ni nul alors création d'un nouvel article
if(isset($_POST['article'])){

    if ((($_POST['article'])!=="")) {

	
	
        $article=$_POST['article'];
        header("Location: blog.php ");
        $article=htmlspecialchars($article, ENT_QUOTES);
        
    

        $sql = "INSERT INTO articles (article) VALUES ('$article')";

        mysqli_query($link, $sql);


    }
    
        
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Creer article</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>
<body class="body_classique">
	
	<header class="header_menu">
		<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >

		<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" > <!-- je sais pas quoi encore mettre comme lien ¯\_(ツ)_/¯ -->

		<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

    <form action="creer_article.php" method="post" class="article_zone">
   		
   		<textarea name="article" class="redac_textarea" placeholder="Entrer le contenu de votre article..." ></textarea><br>

		<input type="submit" class="bouton_article" name="suivant_article" value="Envoyer l'article">

		<input type="button" class="bouton_article" value="Retour au menu des articles" onclick="document.location.href = 'menu_article.php'" ><br>

	</form>



	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>
	

</body>
</html>
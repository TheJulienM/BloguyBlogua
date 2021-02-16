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

$id=$_POST['id'];

$resultat = mysqli_query($link, "SELECT id FROM articles WHERE id='$id'");

// test pour savoir si l'id existe

while($donnees = mysqli_fetch_assoc($resultat)){
    $id_exist=$donnees['id'];
}


if (empty($id_exist)){
    header("location: menu_modifier_article.php");
}




//affiche l'article
$resultat = mysqli_query($link, "SELECT * FROM articles WHERE id='$id'");


while($donnees = mysqli_fetch_assoc($resultat))
{
	$article=$donnees['article'];
	
	
}


//modifier article

if(isset($_POST['article'])){

    if ((($_POST['article'])!=="")) {

        

        $article=htmlspecialchars($_POST['article'], ENT_QUOTES);



        $sql = "UPDATE articles SET article='$article' WHERE id=$id";


        header("Location: blog.php ");
	


        mysqli_query($link, $sql);
        
    }
}


// Fin de la connexion
mysqli_close($link);


?>





<!DOCTYPE html>
<html>
<head>
	<title>Modifier article</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>
<body class="body_classique">
	
	<header class="header_menu">
	
	<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >
	
	<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" > <!-- je sais pas quoi mettre comme lien ¯\_(ツ)_/¯ -->

	<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>
	
    <form action="modifier_article.php" method="post" class="article_zone">
   		
                 <!-- permet de recupérer l'id sans l'afficher !-->
                <input type="HIDDEN" name="id" value="<?php echo $id;?>">
                
   		<textarea name="article" class="redac_textarea" placeholder="Entrer le contenu de votre article..."><?php echo $article;?></textarea><br>
                
		<input type="submit" class="bouton_article" name="suivant_article" value="Envoyer la nouvelle version">
                
		<input type="button" class="bouton_article" value="Retour au menu des articles" onclick="document.location.href = 'menu_article.php'" ><br>

    </form>


	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>
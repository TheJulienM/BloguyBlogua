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
	<title>Menu des articles</title>
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
		Ici vous pouvez gérer vos articles à votre guise ! Vous pouvez en ajouter ou modifier ceux déjà existant, choisisser l'action dont vous avez besoin :
	</div>

	<div class="div_bouton">

	<br>
   	

	<label for=ajout_article>Ajouter un article :</label> <!-- Garde les labels ou non en fonction de ce qui t'arrange -->
	<input type="button" class="bouton" value="Ajouter un article" onclick="document.location.href = 'creer_article.php' "> 

	<label for=ajout_article>Modifier le style :</label>
	<input type="button" class="bouton" value="Style des articles" onclick="document.location.href = 'style_article.php' "><br>

	<label for=ajout_article>Réécrire un article :</label>
	<input type="button" class="bouton" value="Changer un article" onclick="document.location.href = 'menu_modifier_article.php' ">
        <form enctype="multipart/form-data" action="menu_article.php" method="post">
	<!-- ça permet d'afficher un bouton "Ajouter une photo" plutôt qu'un "Choississer fichier" avec un label etc -->
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
   	<input type="button" class="bouton" value="Ajouter une photo" onclick="document.getElementById('photo').click();" />
	<input type="file"  style="display:none;" name="monfichier" id="photo" onchange="document.getElementById('photo_submit').style.visibility = 'visible'; document.getElementById('photo_submit').style.display = 'inline-block';">
	<br>

	<!-- ça permet d'afficher le bouton "Envoyer la photo uniquement si une photo a été saisie si c'est chiant remplaces par les boutons en commentaire en bas de page -->
	<input type="submit" style="display:none; visibility:hidden;" id="photo_submit" class="bouton" value="Envoyer la photo">
        </form>
        
        <?php
        // code d'impotation photo
        $nomOrigine = $_FILES['monfichier']['name'];
        $elementsChemin = pathinfo($nomOrigine);
        $extensionFichier = $elementsChemin['extension'];
        $extensionsAutorisees = array("jpeg", "jpg", "gif", "png", "JPG", "JPEG", "PNG", "GIF");
        if (isset($nomOrigine)){
 
            if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                echo "La photo n'a pas l'extension attendue. Vérifier que la photo soit bien au format jpeg, jpg, gif ou png.<br>";
            } 
            else {    
                // Copie dans le repertoire du script avec un nom
                // incluant l'heure a la seconde pres 
                $repertoireDestination = dirname(__FILE__)."/photo/";
                $nomDestination = "photo.jpg";
    

                    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {
     
                        header("Location: blog.php ");
                    } 
                    else {
                         echo "La photo n'a pas pu être importée. Vérifiez qu'elle ne fasse pas plus de 2 Mo.";
                    }
                    }
                    
        }
        
        ?>

	<input type="button" class="bouton" value="Retour au menu de personnalisation" onclick="document.location.href = 'personnalisation.php'" ><br><br><br>

	</div>

	<footer class="footer">
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>


<?php
//Importation du fichier config.php
require_once "config.php";

//démarage de la session
session_start();
 
//vérification si session non ouverte alors redirection vers login.php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// le bout de code ci dessus est commun à presque toute les pages


//Permet de réaliser l'update seulement si des changement ont été effectué dans menu_modifier_article.php
if(isset($_POST['couleur_article'])){ 
    $couleur_article=$_POST['couleur_article'];
    $couleur_police_article=$_POST['couleur_police_article'];
    $police_article=$_POST['police_article'];
      
    $sql = "UPDATE perso_article SET couleur_article='$couleur_article',couleur_police_article='$couleur_police_article',police_article='$police_article'";

    mysqli_query($link, $sql);
}

//Permet d'afficher le titre du blog
$resultat = mysqli_query($link, "SELECT * FROM perso_blog");

while($donnees = mysqli_fetch_assoc($resultat))
{
	
       $titre_blog=$donnees['titre_blog'];
        
	
	
}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Page du blog</title>
	<link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<script type="text/javascript" src="modifier_article.js"></script>
	<meta charset="utf-8">
</head>
<body id="body_blog">
		
	<header id="header_blog">
	

	<input type="submit" id="lien_deconnect_blog" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'logout.php'" >
        <label for="bouton_deconnexion" id="label_lien_deconnect">Connecté en tant que <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></label>
	 

	<input type="button" class="bouton_article" id="label_menu_perso" value="Modifier mot de passe" onclick="document.location.href = 'modifier_mdp.php'" >
	
        <?php if(($_SESSION["username"]) == "admin"){ 

                echo '<a href="personnalisation.php"><input type="button" id="menu_perso" name="menu_personnalisation" class="menu_personnalisation" value="Personnaliser le blog"/></a>';
                }
         ?>
                                                            
        <label for="h1_blog"><img src="photo/logo.jpg?time=<?php echo time(); ?>" id="logo"></label>
        <h1 id="h1_blog"><?php echo $titre_blog;?></h1>

	</header>

	<div class="image_border">       
       <img src="photo/photo.jpg?time=<?php echo time(); ?>"  id="image">
    </div>
    
    
    
    
    <?php
                 

    //permet de faire en sorte que la variable nombre prenne la dernière valeur id             
    $resultat = mysqli_query($link, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 1");
    $row = mysqli_fetch_array($resultat);
    $nombres=$row['id'];             
                 



    //boucle permettant d'afficher les articles
    while ($nombres >=1){
   
        $resultat = mysqli_query($link, "SELECT * FROM articles WHERE id='$nombres'");
    
        $donnees = mysqli_fetch_assoc($resultat);
        if(!empty($donnees)){
    
            echo '<div class="article"><h3>Article '.$donnees['id'].'</h3>'.nl2br($donnees['article']).'</div>';
            $donnees= null;
    
        }
    $nombres--;
   
    }

    ?>   

 

	<footer class="footer_blog">
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>
			


</body>
</html>
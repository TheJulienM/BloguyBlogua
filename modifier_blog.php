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


//affiche les données    

$resultat = mysqli_query($link, "SELECT * FROM perso_blog");


while($donnees = mysqli_fetch_assoc($resultat)){

	
        $couleur_blog=$donnees['couleur_blog'];
        $couleur_header_footer=$donnees['couleur_header_footer'];
        $police_titre=$donnees['police_titre'];
        $titre_blog=$donnees['titre_blog'];
	
	
}


?>





<!DOCTYPE html>
<html>
<head>
	<title>Modifier blog</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<script type="text/javascript" src="input_color.js"></script>
	<meta charset="utf-8">
</head>
<body class="body_classique" onload="LoadBlogHF();"> 

	<header class="header_menu">
	
	<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >

	<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" > <!-- je sais pas quoi encore mettre comme lien ¯\_(ツ)_/¯ -->

	<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

	<div class="msg_accueil_menu">
			
			Bienvenue dans l'espace où tu peux modifier l'aspect de ton blog ! 
			C'est dans cet espace que tu pourras modifier sa couleur de fond, son nom, son logo etc...
			

	</div>

    <form enctype="multipart/form-data" action="modifier_blog.php" method="post">
   	<div class="div_bouton">
            
                <br>
                <label for="nom_blog">Saisir le nom du blog :</label>
		<input type="text" for="nom_blog" name="titre_blog" class="input_text" value="<?php echo $titre_blog;?>"><br>

   		<div class="color_border">
	
		<label for="clr_blog">Couleur de fond du blog :</label>
                <input type="color" id="clr_blog" name="couleur_blog" class="color_select" value="<?php echo $couleur_blog;?>"><br>
   		
                
   		</div>

   		<div class="color_border">
	
		<label for="clr_head_foot">Couleur haut/bas de page :</label>
   		<input type="color" id="clr_head_foot" name="couleur_header_footer" class="color_select" value="<?php echo $couleur_header_footer;?>"><br>
   		

   		</div>

		<div class="selecteur_police">
   			<label for="police">Police du nom :</label>
   			<select name="police_titre" class="bouton_police" ><br>
                                <option style="display:none;"><?php echo $police_titre;?>
				<option> Arial
				<option> Arial Black
				<option> Impact
				<option> Comic Sans Ms
				<option> Courrier
				<option> Times New Roman
			</select>
		</div>

		
               
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
   		<input type="button" class="bouton" value="Modifier logo" onclick="document.getElementById('logo_bouton').click();" />
		<input type="file"  style="display:none;" name="monlogo" id="logo_bouton"><br>

                <input type="submit" class="bouton" name="changement_bouton" value="Envoyer changement(s)"><br>
              



        <?php
        
        // code d'impotation photo
        $nomOrigine = $_FILES['monlogo']['name'];
        $elementsChemin = pathinfo($nomOrigine);
        $extensionFichier = $elementsChemin['extension'];
        $extensionsAutorisees = array("jpeg", "jpg", "gif", "png", "JPG", "JPEG", "PNG", "GIF");
        
        if (isset($nomOrigine)){
            
            if(empty($extensionFichier)){
   
                $titre_blog=$_POST['titre_blog']; 
        

                if (empty($titre_blog)){
                    header("location: modifier_blog.php");
                }
            
            
                else{  
                
                    if(isset($_POST['titre_blog'])){ 
                    
                    $couleur_blog=$_POST['couleur_blog'];
                    $couleur_header_footer=$_POST['couleur_header_footer'];
                    $police_titre=$_POST['police_titre'];
                    $titre_blog=htmlspecialchars($_POST['titre_blog'], ENT_QUOTES);

                    $sql = "UPDATE perso_blog SET couleur_blog='$couleur_blog',couleur_header_footer='$couleur_header_footer',police_titre='$police_titre',titre_blog='$titre_blog'";

                    mysqli_query($link, $sql);
                    }
        
                header("Location: blog.php ");  
            
                }
            
            }
            else{
            
            
                if (!(in_array($extensionFichier, $extensionsAutorisees))) {
                echo "Le logo n'a pas l'extension attendue. Vérifier que le logo soit bien au format jpeg, jpg, gif ou png.<br>";
                } 
            
                else {    
                // Copie dans le repertoire du script avec un nom
                // incluant l'heure a la seconde pres 
                $repertoireDestination = dirname(__FILE__)."/photo/";
                $nomDestination = "logo.jpg";
    

                    if (move_uploaded_file($_FILES["monlogo"]["tmp_name"],$repertoireDestination.$nomDestination)) {
                    header("Location: blog.php ");
                    } 
                    else {
                    echo "Le logo n'a pas pu être importé. Vérifiez qu'il ne fasse pas plus de 2 Mo.";
                    }
                    
                    
                }
            }
        }
        ?>

   		<input type="button" class="bouton" value="Retour au menu de personnalisation" onclick="document.location.href = 'personnalisation.php'" ><br><br>

   	</div>
   </form>

   	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>

</body>
</html>

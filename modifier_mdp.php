<?php

require_once "config.php";


session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 



$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Veuillez entrer votre nouveau mot de passe.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Le mot de passe doit contenir au moins 6 caractères.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez confirmer votre nouveau mot de passe.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Les mots de passe ne correspondent pas.";
        }
    }
        
    
    if(empty($new_password_err) && empty($confirm_password_err)){
        
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            
            if(mysqli_stmt_execute($stmt)){
                
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Il y a un problème. Veuillez réessayer plus tard.";
            }
        }
        
        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($link);
}



?>




<!DOCTYPE html>
<html>
<head>
	<title>Modifier mot de passe</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
</head>
<body class="body_classique">
	
	<header class="header_menu">
	
	<input type="button" class="retour_blog" value="Retour au blog" onclick="document.location.href = 'blog.php'" >
	
	<input type="submit" class="lien_deconnect" name="bouton_deconnexion" value="Se déconnecter" onclick="document.location.href = 'register.php'" ><!-- je sais pas quoi mettre comme lien ¯\_(ツ)_/¯ -->

	<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

	<div class="msg_accueil_menu">
		Bonjour <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> ! Ici tu peux modifier ton mot de passe, nous te conseillons de le changer régulièrement !
	</div>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="div_bouton"><br><br>
   		
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                
   		<label for="mdp">Saisissez votre mot de passe :</label>
		<input type="password" id="mdp_new" name="new_password" class="input_text" placeholder="Saisir nouveau mot de passe" value="<?php echo $new_password; ?>"><br>
                <span class="help-block"><?php echo $new_password_err; ?></span><br><br>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                
		<label for="mdp_new">Confirmez votre mot de passe :</label>
		<input type="password" id="mdp_new" name="confirm_password" class="input_text" placeholder="Confirmation du mot de passe"><br>
                <span class="help-block"><?php echo $confirm_password_err; ?></span><br>
		<input type="submit" class="bouton_article" name="submit_mdp" value="Envoyer le nouveau mot de passe"><br>

		<input type="button" class="bouton_article" value="Annuler" onclick="document.location.href = 'blog.php'" ><br><br>

	</form>

	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>
</body>
</html>
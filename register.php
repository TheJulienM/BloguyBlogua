<?php

require_once "config.php";

 

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Rentrer un nom d'utilisateur";
    } else{
        
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = trim($_POST["username"]);
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Ce nom d'utlisisateur est déjà pris.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Il y a un problème. Veuillez réessayer plus tard.";
            }
        }
         
       
        mysqli_stmt_close($stmt);
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Rentrez un mot de passe";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Le mot de passe doit avoir au moins 6 caractères";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirmer le mot de passe";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Les mots de passe ne correspondent pas ";
        }
    }
    
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: login.php");
            } else{
                echo "Oops! Il y a un problème. Veuillez réessayer plus tard.";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>
<body class="body_classique">
	
	<header class="header_menu">
		<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

	<div class="msg_accueil_menu">
		Bonjour et bienvenue sur  Bloguy Blogua ! Ici créer et visiter des blogs à votre guise ! 
		Mais avant cela veuillez créer un compte pour accéder à nos services.
	</div>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="div_bouton"><br><br>
   		<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
		<label for="login">Saisir votre identifiant :</label>
		<input type="text" id="login" name="username" class="input_text" placeholder="DédéDu92" value="<?php echo $username; ?>"><br>
                <span class="help-block"><?php echo $username_err; ?></span><br><br>
                </div> 
                
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
		<label for="password">Saisir votre mot de passe :</label>
		<input type="password" id="password" name="password" class="input_text" placeholder="Labrador92*" value="<?php echo $password; ?>"><br>
                <span class="help-block"><?php echo $password_err; ?></span><br><br>
                
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
		<label for="password_confirm">Confirmer votre mot de passe :</label>
		<input type="password" id="password_confirm" name="confirm_password" class="input_text" placeholder="Labrador92*" value="<?php echo $confirm_password; ?>"><br>
                <span class="help-block"><?php echo $confirm_password_err; ?></span><br><br>
                     
		<input type="button" class="bouton_article" name="submit_mdp" value="Déjà un compte ?" onclick="document.location.href = 'login.php' ">
                <input type="reset" class="bouton_article" value="Réinitialiser"><br>
                <input type="submit" class="bouton_article" value="Suivant"><br><br>
                
	</form>

	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>
</body>
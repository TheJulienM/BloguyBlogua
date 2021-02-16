<?php


require_once "config.php";


session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: blog.php");
    exit;
}
 


 

$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Rentrer votre identifiant";
    } else{
        $username = trim($_POST["username"]);
    }
    
   
    if(empty(trim($_POST["password"]))){
        $password_err = "Rentrer votre mot de passe";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                                                      
                            
                            
                            header("location: blog.php");
                        } else{
                            
                            $password_err = "Le mot de passe que vous avez saisis n'est pas valide";
                        }
                    }
                } else{
                    
                    $username_err = "Pas de compte associé a ce nom d'utilisateur";
                }
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
	<title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="bloguyblogua_style.php">
	<meta charset="utf-8">
</head>

<body class="body_classique">
	
	<header class="header_menu">
		<h1>BLOGUY BLOGUA CORPORATION</h1>
	</header>

	<div class="msg_accueil_menu">
		Bonjour et bienvenue sur la page d'accueil de Bloguy Blogua ! Veuillez vous identifier s'il vous plaît.
	</div>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post" class="div_bouton"><br></br>

   		
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label for="login">Saisir votre identifiant :</label>
                    <input type="text" id="login" name="username" class="input_text" placeholder="Saisir votre identifiant" value="<?php echo $username; ?>"><br>
                    <span class="help-block"><?php echo $username_err; ?></span><br><br>
                </div> 
                
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label for="mdp">Saisir votre mot de passe :</label>
                    <input type="password" for="mdp" name="password" class="input_text" placeholder="Saisir votre mot de passe"><br>
                    <span class="help-block"><?php echo $password_err; ?></span><br><br>
                </div>
                
		<input type="button" class="bouton_article" name="submit_mdp" value="Pas de compte ?" onclick="document.location.href = 'register.php' ">
                <input type="reset" class="bouton_article" value="Réinitialiser"><br>
		<input type="submit" class="bouton_article" name="submit_mdp" value="Aller au blog"><br><br>

	</form>

	<footer>
		<h2>THIS PAGE WEB IS A PROPERTY OF ©BloguyBloguaCorp. All rights reserved.</h2>
	</footer>
    
</body>
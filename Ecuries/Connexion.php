<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MEF_2.css" type="text/css">
    <title>Connexion</title>
</head>
<body>
<?php

session_start();
$connexion="";
try {
    $connexion=new PDO('mysql:host=localhost;dbname=stables','root','', array(
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_CASE => PDO::CASE_LOWER,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
              PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
          ));

echo "Connexion réussie";

  }
   catch(PDOException $e) {
          die("Database connection failed: " . $e->getMessage());
      echo "erreur connexion";  
  }
if (isset($_POST["mail"]) && !empty($_POST["mail"]) && isset($_POST["mdp"]) && !empty($_POST["mdp"])) {
    $rq = "SELECT * FROM clients WHERE email = ? AND mdp = ?";
    $state = $connexion->prepare($rq);
    $state->bindParam(1, $_POST["mail"], PDO::PARAM_STR);
    $state->bindParam(2, $_POST["mdp"], PDO::PARAM_STR);
    $state->execute();
    if ($state->rowCount() == 1) {
        $ligne=$state->fetch();
        $_SESSION["nom_cli"]=$ligne["nom"];
        $_SESSION["prenom_cli"]=$ligne["prenom"];
        $_SESSION["niveau_cli"]=$ligne["niveau"];
        $_SESSION["licence_cli"]=$ligne["num_licence"];
        header('Location:http://localhost/choflack/Ecuries/liste_chevaux.php');

    }else{
        echo "<p>Connexion impossible, login ou mot de passe erroné</p>";
    }


} else {
    echo "<p>Veuillez remplir tous les champs.</p>";
}


?>

    <fieldset><legend>Connexion</legend>
    <form action="Connexion.php" method="POST" enctype="multipart/form-data">
    <label>E-mail</label><br/>
    <input type="text" id="mail" name="mail" placeholder="E-mail"><br/>
    <label>Mot de passe</label><br/>
    <input type="text" id="mdp" name="mdp" placeholder="Mot de passe"><br/>
    <input type="submit" id="connect" name="connect" value="Se connecter">
    </form>
</fieldset>
<fieldset><legend>Bienvenue!</legend>
<p>Connectez-vous</p>
<p>Ou</p> 
<a href="Page_inscription.php">Inscrivez-vous</a> 
<p>Pour continuer.</p>
<p>Tel: 0102030405</p>
<p>Email: example@gmail.com</p>
</fieldset>
<fieldset><legend>Qui sommes-nous?</legend>
<p>Ecurie de compétition, de loisirs et de propriétaires, l'écurie Saint-Augustin 
vous propose des locations de poneys et chevaux convenant à tous les âges et niveaux.</p>
</fieldset>
</body>
</html> 
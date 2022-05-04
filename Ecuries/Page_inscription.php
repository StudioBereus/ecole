<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MEF.css" type="text/css">
    <script src="Dynamisation.js"defer></script>
    <title>Inscription</title>
</head>
<body>
    <h1>Ecurie Saint-Augustin<h1>
    <h1>Location de chevaux<h2><br/>
    <fieldset><legend>Inscrivez-vous</legend>
    <form>
    <label>Votre adresse email</label><br/>
    <input type="text" id="mail" name="mail" placeholder="Votre email"><br/>
    <label>Votre mot de passe</label><br/>
    <input type="text" id="mdp" name="mdp" placeholder="Votre mot de passe"><br/>
    <label>Verification du mot de passe</label><br/>
    <input type="text" id="verif" name="verif" placeholder="Votre mot de passe"><br/>
    <label>Votre nom</label><br/>
    <input type="text" id="Nom" name="Nom" placeholder="Votre nom"><br/>
    <label>Votre prénom</label><br/>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prenom"><br/>
    <label>Votre date de naissance</label><br/>
    <select name="jour" id="jour">
    </select>
    <select name="Mois" id="mois">
    </select>
    <select name="annee" id="annee">
    </select><br/>
    <label>Votre niveau</label><br/>
    <select name="niveau" id="niveau">
    </select>
    <br/>
    <label>Votre numéro de license</label>
    <br/>
    <input type="text" name="num_license" id="num_license" placeholder="N°...">
    <br/>
    <input type="submit" id="Valider" name="valider" value="Valider l'inscription">
    </form>
</fieldset>
</body>
</html>
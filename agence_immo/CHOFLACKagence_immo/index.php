<?php //J'ai bricolé un head pour pouvoir faire une liste deroulante JavaScript, j'ai pas reussi a faire autrement... ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="listeDeroulante.js"defer></script>
	<title>Document</title>
	
</head>
<body>
	
</body>
</html>
<?php
/* HEADER entete avec dépendances CSS 
  ================================================== */
include("header.php");


/*NAVBAR
    ================================================== */
include("menu.php");

/* Carousel
    ================================================== */

include("slider.php");


/*  Marketing mainpage 
    ================================================== 
   Wrap the rest of the page in another container to center all the content. */
//$categorie à definir en fonction de la catégorie de bien choisie dans le formulaire.       




$categorie = "A définir";


echo '<h1>Liste des biens immobiliers</h1>';



echo '<form  action="#">
				 <fieldset><legend>Rechercher un Bien immobilier</legend>
				 
				  <div class="form-group">
 <input type="hidden" name="lib_cat" value="' . $categorie . '" id="lib_cat" />
 
 <label for="dept">Choisir le département</label>';

echo '<select name="dep"  id="dep" class="form-control"  style=" max-width:300px">';


echo '</select>';
echo ' </div>
 <div class="form-group">
 
 <label for="budget">Montant budget maximum</label>
 	<span class="currencyinput">€
<input type="number"  step="10000" id="bugdet" name="budget" placeholder="Budget Max"  min="50000" max="900000000" />
</span>
</div>

<div class="form-group">
 <label for="nbpiece" >Nombre de pièces souhaitées:</label>';

echo '<select name="nbpieces"  id="nbre" class="form-control"  style=" max-width:300px">
<option value="5">5 Pièces</option>
<option value="4">4 Pièces</option>
<option value="3">3 Pièces</option>
<option value="0">0 Pièce</option>';
echo "</select></div>";

echo"<label>Type de bien</label>";

echo'<select name="type_bien" id="type" class="form-control" style="max-width:300px">
<option value="1">1-Appartement</option>
<option value="2">2-Maison</option>
<option value="3">3-Terrain</option>
<option value="4">4-Local professionel</option>
</select>';

echo '<div class="form-group form-button" id="btnsub" >				  
 <button type="submit" class="btn btn-primary" name="envoi">Submit</button> </div></fieldset></form>';
//echo '<button type="submit" class="btn btn-primary" name="seeAll">Tout afficher</button>' ;

//Le nombre de pièces et le budget maximum fixé
if(!empty($_GET["nbpieces"]) && !empty($_GET["budget"]) && isset($_GET["envoi"])){
	$connexion = "";
	try {
		$connexion = new PDO('mysql:host=localhost;dbname=agence_immo', 'root', '', array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_LOWER,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		));
	} catch (PDOException $e) {
		die("Database connection failed: " . $e->getMessage());
		echo "Erreur connexion";
	}
	$nb=$_GET["nbpieces"];
	$bud=$_GET["budget"];
	$rq="SELECT*FROM biens_immobiliers WHERE nbr_pieces=:nbpieces AND prix_vente<:budget";
//Je ne sais pas pourquoi, ici, il affiche deux fois le tableau... Et ne prend pas en compte le nombre de pieces selectionnées (mais il prend en 
//compte le budget)
	echo '<table id="list"><thead><tr> <th>Titre</th> <th>Nombre de pièces</th> <th>Surface</th> <th>Prix de vente</th> <th>Description</th>
	<th>GES</th> <th>Classe eco</th> <th>Meuble(s)</th> <th>Localisation</th> <th>Num_departement</th> <th>Ville</th>
	<th>Charges annuelles</th> <th>id Commercial</th> <th>Catégorie</th> <th>Propriétaire</th> </tr> </thead> <tbody>';

	$state = $connexion->prepare($rq);
	$state->execute(array(":nbpieces" => $nb, ":budget" => $bud));

	while ($ligne = $state->fetch()) {
		echo '<tr>';
		for ($i = 1; $i <16 ; $i++) {
			echo '<td>' . $ligne[$i] . '</td>';
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
}


//Pour afficher la liste en fonction du type de bien
if (!empty($_GET["type_bien"]) && isset($_GET["envoi"])) {
	$connexion = "";
	try {
		$connexion = new PDO('mysql:host=localhost;dbname=agence_immo', 'root', '', array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_LOWER,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		));
	} catch (PDOException $e) {
		die("Database connection failed: " . $e->getMessage());
		echo "Erreur connexion";
	}
	$type=$_GET["type_bien"];
	$rq="SELECT * FROM biens_immobiliers where id_categorie like :type_bien";


	echo '<table id="list"><thead><tr> <th>Titre</th> <th>Nombre de pièces</th> <th>Surface</th> <th>Prix de vente</th> <th>Description</th>
	<th>GES</th> <th>Classe eco</th> <th>Meuble(s)</th> <th>Localisation</th> <th>Num_departement</th> <th>Ville</th>
	<th>Charges annuelles</th> <th>id Commercial</th> <th>Catégorie</th> <th>Propriétaire</th> </tr> </thead> <tbody>';

	$state = $connexion->prepare($rq);
	$state->execute(array(":type_bien"=>$type));

	while ($ligne = $state->fetch()) {
		echo '<tr>';
		for ($i = 1; $i <16 ; $i++) {
			echo '<td>' . $ligne[$i] . '</td>';
		}
		echo '</tr>';
	}
	echo '</tbody></table>';
}


include("acces_membre.php");



/* Pied de page avec dépendances Javascript...
    ================================================== */
include("footer.php");

?>
          
   



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="connect.js" defer></script>
    <link rel="stylesheet" href="MEF_3.css" type="text/css">

    <title>Liste</title>
</head>

<body>
    <section>
        <?php
        session_start();

        $nom = $_SESSION["nom_cli"];
        $prenom = $_SESSION["prenom_cli"];
        $niveau = $_SESSION["niveau_cli"];
        $licence = $_SESSION["licence_cli"];
        ?>
        <fieldset class="filtres">
            <legend>Filtre(s)</legend>
            <p>
            <form action="liste_chevaux.php" method="GET" enctype="multipart/form-data">
                <label>Genre:</label></br>
                <select name="genre" id="genre">
                    <option value="Etalon">Etalon</option>
                    <option value="Hongre">Hongre</option>
                    <option value="Jument">Jument</option>
                </select>
                <br />
                <label>Niveau:<label></br>
                        <select name="min_niv" id="niveau_1">
                        </select> <select name="max_niv" id="niveau_2"> </select></br>
                        <label>Taille:</label></br>
                        <input type="number" name="Size_1" id="Size_1" placeholder="Min"><input type="number" name="Size_2" id="Size_2" placeholder="Max"></br>
                        <label>Age:</label></br>
                        <input type="number" name="age_1" id="age_1" placeholder="Min"><input type="number" name="age_2" id="age_2" placeholder="Max"></br>
                        <label>Race:</label>
                        </br>
                        <label>Elevage:</label>
                        <br />
                        <label>Robe :</label>
                        </br>
                        <Select>
                            <option value="Choisir">Choisir</option>
                            <option value="Indifférent">Indifférent</option>
                            <option value="Alezan">Alezan</option>
                            <option value="Alezan brûlé">Alezan brûlé</option>
                            <option value="Alezan crins lavés">Alezan crins lavés</option>
                            <option value="Alezan brûlé crins lavés">Alezan brûlé crins lavés</option>
                            <option value="Aubère">Aubère</option>
                            <option value="Bai">Bai</option>
                            <option value="Bai brûlé">Bai brûlé</option>
                            <option value="Bai cerise">Bai Cerise</option>
                            <option value="Bai foncé">Bai foncé</option>
                            <option value="Gris">Gris</option>
                            <option value="Gris pommelé">Gris pommelé</option>
                            <option value="Gris souris">Gris souris</option>
                            <option value="Gris truité">Gris truité</option>
                            <option value="Isabelle">Isabelle</option>
                            <option value="Isabelle brûlé">Isabelle brûlé</option>
                            <option value="Léopard noir">Noir</option>
                            <option value="Pie Alezan">Pie alezan</option>
                            <option value="Pie Bai">Pie bai</option>
                            <option value="Pie noir">Pie Noir</option>
                        </Select>
                        </br>
                        Rechercher par
                        <label>nom</label></br><input type="text" name="nom_cheval" id="nom_cheval" placeholder="Nom du cheval"><br />
                        <input type="Submit" value="Filtrer" name="valider" />
                        <input type="Submit" value="Afficher tout" name="afficherTout">
            </form>

            </p>

        </fieldset>
        <fieldset class="tri">
            <legend>Trier par...</legend>
            <form method="GET" action="liste_chevaux.php" >
                <div>
                    <label>Taille</label>
                    <input type="radio" id="taille" name="taille" value="Taille">
                 
                    </br>

                    <label>Age</label>
                    <input type="radio" id="age" name="age" value="Age">

                    </br>

                    <label>Niveau</label>
                    <input type="radio" id="niveau" name="niveau" value="Age">

                    </br>

                    <label>Nom</label>
                    <input type="radio" id="nom_tri" name="nom" value="nom">

                    </br>
                    <input type="submit" value="Trier" name="trier">
                </div>
            </form>
            
            <?php
                   
                    ?>
        </fieldset>
        <aside>
            <?php
            if (isset($_GET["nom"]) && isset($_GET["trier"])) {
                $connexion = "";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $rq = "SELECT * FROM horses ORDER BY horse_name ASC";
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute();

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            if (isset($_GET["niveau"]) && isset($_GET["trier"])) {
                $connexion = "";
                echo "test";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $rq = "SELECT * FROM horses ORDER BY level_recomended ASC";
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute();

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            if (isset($_GET["age"]) && isset($_GET["trier"])) {
                $connexion = "";
                echo "test";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $rq = "SELECT * FROM horses ORDER BY age ASC";
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute();

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            if (isset($_GET["taille"]) && isset($_GET["trier"])) {
                $connexion = "";
                echo "test";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $rq = "SELECT * FROM horses ORDER BY size ASC";
                echo $rq;
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute();

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            if (isset($_GET["afficherTout"])) {
                $connexion = "";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $rq = "SELECT * FROM horses";
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute();

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            if (isset($_GET["nom_cheval"])) {
                $connexion = "";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $nom = $_GET["nom_cheval"];
                $rq = "SELECT * FROM horses WHERE horse_name like :nom";
                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute(array(":nom" => $nom));

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }

            if (isset($_GET["valider"]) && !empty($_GET["min_niv"]) && !empty($_GET["max_niv"]) && !empty($_GET["genre"])) {
                $connexion = "";
                try {
                    $connexion = new PDO('mysql:host=localhost;dbname=stables', 'root', '', array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_CASE => PDO::CASE_LOWER,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                    ));
                } catch (PDOException $e) {
                    die("Database connection failed: " . $e->getMessage());
                    echo "Erreur connexion";
                }
                $min = $_GET["min_niv"];
                $max = $_GET["max_niv"];
                $type = $_GET["genre"];

                $rq = "SELECT * FROM horses where level_recomended between :min_niv and :max_niv and gender like :genre";
                echo $rq;

                echo '<table id="list"> <thead><tr> <th>Nom</th> <th>Genre</th> <th>Age</th> <th>Robe</th> <th>Niveau recommandé</th> <th>Taille</th> </tr></thead><tbody>';
                $state = $connexion->prepare($rq);
                $state->execute(array(":min_niv" => $min, ":max_niv" => $max, ":genre" => $type));

                while ($ligne = $state->fetch()) {
                    echo '<tr>';
                    for ($i = 1; $i < 7; $i++) {
                        echo '<td>' . $ligne[$i] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </aside>
    </section>

</body>

</html>
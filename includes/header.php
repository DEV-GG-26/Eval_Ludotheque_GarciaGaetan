<?php
$nav = "";
if(isset($_SESSION['id'])){
    $prenom = $_SESSION['prenom'];
    $nav = "Bonjour  ".$prenom."<br>";
    $nav .= "<a href='index.php'>Accueil</a>"."  "."<a href='ajout-jeu.php'>Ajouter un jeu</a>"."  "."<a href='deconnexion.php'>Déconnexion</a>";
}
else{
    $nav = "<a href='index.php'>Accueil</a>"."  "."<a href='inscription.php'>Inscription</a>"."  "."<a href='connexion.php'>Connexion</a>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="src/css/style.css" rel="stylesheet" />
</head>
<body>
    <header>
        <nav>
            <?php echo($nav) ?>
          <!--  <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>-->
        </nav>
    </header>
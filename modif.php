<?php
include('connect.php');

session_start();

if (!isset($_SESSION['acces'])){
    header('Location:connexion.php');
}

if ($_SESSION['role'] == 1){
    header('Location:produit.php');
}

if(isset($_POST["nom"])&&isset($_POST["image"])&&isset($_POST["short"])&&isset($_POST["descript"])&&isset($_POST["num"])&&isset($_POST["type"])){
    $nom = $_POST["nom"];
    $image = $_POST["image"];
    $short = $_POST["short"];
    $descr = $_POST["descript"];
    $num = $_POST["num"];
    $type = $_POST["type"];

    $qry = "INSERT INTO produit(nom, descript, mini_desc, image, num_serie, type) VALUES ('".$nom."','".$descr."','".$short."','".$image."','".$num."','".$type."')";
    $dbs->query($qry);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/modif.css">
        <link rel="stylesheet" href="style/main.css">
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <a href="produits.php"><img id="logo" src="ressources/logo_univ.png" alt="logo"></a>
            <nav>
                <ul id="navbar">
                    <li><a href="produits.php">Matériels</a></li>
                    <li><a href="reserver.php">Réserver</a></li>
                    <li><a href="reservation.php">Compte</a></li>
                    <li><a href="deco.php">Déconnexion</a></li>
                </ul>
            </nav>
        </header>
        <div id="main">
            <div id="inte">
                <h1>Ajouter du matériel</h1>
                <form id="form" method="POST" action="modif.php">
                <div id='haut'>
                    <div>
                        <label for="nom">nom du produit : </label>
                        <input type="text" name="nom">
                    </div>
                    <div>
                        <label for="image">nom de l'image : </label>
                        <input type="text" name="image">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="num">Numéro de série : </label>
                        <input id='minin' type="text" name="num">
                    </div>
                    <div>
                        <label for="type">Type de produit : </label>
                        <input id='minin' type="text" name="type">
                    </div>
                </div>
                <div id="mini">
                    <label for="short">Mini description : </label>
                    <input id='minin' type="text" name="short">
                </div>
                <div id="desk">
                    <label for="descript">Description du produit :</label>
                    <input id="descn" type="text" name="descript">
                </div>
                <input type='submit' id='btn' value="envoyer les modifications">
                </form>
            </div>
        </div>
    </body>
</html>
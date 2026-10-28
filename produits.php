<?php
include("connect.php");

session_start();

if (!isset($_SESSION['acces'])){
    header('Location:connexion.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Le matériel</title>
    <link rel="stylesheet" href="style/main.css" type="text/css">
    <link rel="stylesheet" href="style/produits.css" type="text/css">
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
    <h2>Le matériel</h2>
    <section class="ligne">
        <?php
        $req = "SELECT image,nom,mini_desc,num_serie FROM produit";
        foreach ($dbs->query($req) as $res){
        $num=$res["num_serie"];
        echo' 
        <article class="case">
        <div class="image">
            <img src="ressources/materiel/'.$res["image"].'" alt="pc gaming Dell">
        </div>
        <div class="colonne">
            <div>
                <h3>'.$res["nom"].'</h3>
                <p>'.$res["mini_desc"].'</p>
            </div>
            <div class="infos">
                <a onclick="pc(`'.$num.'`)">Cliquez pour plus d\'informations</a>
            </div>
        </div>
        </article>
        ';
        }

        ?>
        <div id="phd">

            </div>
    </section>
    <?php
    if ($_SESSION['role'] == 2){
        echo'<a id="lien" href="modif.php"><button id="valider">Ajouter un produit</button></a>';
    }
    ?>
    <script src="js/produits.js"></script>
</body>
</html>
<?php
include('connect.php');

session_start();

if (!isset($_SESSION['acces'])){
    header('Location:connexion.php');
}

if ($_SESSION['role'] == 2){
    header('Location:reservationadmin.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Réservations</title>
    <link rel="stylesheet" href="style/main.css" type="text/css">
    <link rel="stylesheet" href="style/reservation.css" type="text/css">
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
    <h1>Mes Réservations</h1>
    <div class="centre">
        <?php
            $query="SELECT nom,image,debut,fin FROM emprunt INNER JOIN produit ON emprunt.num_serie = produit.num_serie WHERE mail = '".$_SESSION["mail"]."'";
            foreach ($dbs->query($query) as $res){
                echo"<div class='menu'>
                <div class='div1'>
                    <img class='image' src='ressources/materiel/".$res['image']."'>
                </div>
                <div class='div2'>
                    <h2>".$res['nom']."</h2>
                    <div class='div3'>
                        <h2>date d'emprunt : ".$res['debut']." </h2>
                        <h2>date de rendu : ".$res['fin']." </h2> 
                    </div>
                </div>
            </div>";
            }
        ?>
    </div>
</body>
</html>
<script src='js/reservation.js'></script>
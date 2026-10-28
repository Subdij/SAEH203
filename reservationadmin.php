<?php
    include("connect.php");
    
    session_start();

    if (!isset($_SESSION['acces'])){
        header('Location:connexion.php');
    }
    
    if ($_SESSION['role'] == 1){
        header('Location:reservation.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style/reservationadmin.css" rel="stylesheet">
        <link href="style/main.css" rel="stylesheet">
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
        <div id="page">
            <h1>Les demandes de réservation</h1>
            <div id="tableau">
                <div id="gauche">
                    <?php
                    $query="SELECT ID,nom,image,debut,fin,statut FROM emprunt LEFT JOIN produit ON emprunt.num_serie = produit.num_serie WHERE statut = '3'";
                    foreach ($dbs->query($query) as $res){
                        echo"<div class='menu'>
                        <div class='div1'>
                            <img class='image' src='ressources/materiel/".$res['image']."'>
                        </div>
                        <div class='div2'>
                            <div id='div2haut'>
                            <h2>".$res['nom']."</h2>
                            <a id='val' href='changement.php?ID=".$res['ID']."&statut=1'>valider</a>
                            <a id='ref' href='changement.php?ID=".$res['ID']."&statut=2'>refuser</a>
                            </div>
                            <div class='div3'>
                                <h2>date d'emprunt : ".$res['debut']."</h2>
                                <h2>date de rendu : ".$res['fin']."</h2> 
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                </div>
                <div id="droite">
                    <?php
                    $query="SELECT ID,nom,image,debut,fin,statut FROM emprunt LEFT JOIN produit ON emprunt.num_serie = produit.num_serie WHERE statut NOT LIKE '3'";
                    foreach ($dbs->query($query) as $res){
                    if ($res["statut"]==2){
                        echo"<div class='menu'>
                        <div class='div1'>
                            <img class='image' src='ressources/materiel/".$res['image']."'>
                        </div>
                        <div class='div2'>
                            <div id='div2haut'>
                                <h2>".$res['nom']."</h2>
                                <p id='refus'>REFUSÉ</h2>
                            </div>
                            <div class='div3'>
                                <h2>date d'emprunt : ".$res['debut']."</h2>
                                <h2>date de rendu : ".$res['fin']."</h2> 
                            </div>
                        </div>
                    </div>";
                    } else
                    {
                        echo"<div class='menu'>
                        <div class='div1'>
                            <img class='image' src='ressources/materiel/".$res['image']."'>
                        </div>
                        <div class='div2'>
                            <div id='div2haut'>
                                <h2>".$res['nom']."</h2>
                                <p id='acc'>ACCEPTÉ</p>
                            </div>
                            <div class='div3'>
                                <h2>date d'emprunt : ".$res['debut']."</h2>
                                <h2>date de rendu : ".$res['fin']."</h2> 
                            </div>
                        </div>
                    </div>";
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
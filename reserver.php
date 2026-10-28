<?php
include("connect.php");

session_start();
$_SESSION['acces'] = "non";

if ($_SESSION['acces']=="oui"){
    header('Location:produits.php');
}

if (!isset($_SESSION["panier"])){
    $_SESSION["panier"] = array();
}

if(isset($_GET['rel'])){
    $co = $_GET["rel"];
    array_push($_SESSION["panier"],$co);
}

if(isset($_POST['emprunt']) && isset($_POST['retour'])){
    $emprunt = $_POST["emprunt"];
    $retour = $_POST["retour"];

    foreach($_SESSION['panier'] as $res){
        $req = "INSERT INTO emprunt(debut, fin, statut, num_serie, mail) VALUES ('".$emprunt."','".$retour."','3','".$res."','".$_SESSION['mail']."')";
        $dbs->query($req);
}
$_SESSION["panier"] = array();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/main.css" type="text/css">
    <link rel="stylesheet" href="style/reserver.css" type="text/css">
    <title>Réserver du matériel</title>
</head>
<body>
    <header>
        <a href="produits.php"><img id="logo" src="ressources/logo_univ.png" alt="logo"></a>
        <nav>
            <ul id="navbar">
                <li><a href="produits.php">Matériels</a></li>
                <li><a href="reserver.html">Réserver</a></li>
                <li><a href="reservation.php">Compte</a></li>
                <li><a href="deco.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <h2>Réserver du matériel</h2>
    <h3>Vos produits :</h3>
    <section id="produits">
        <?php
        foreach ($_SESSION["panier"] as $var){
            $req = "SELECT image,nom FROM produit WHERE num_serie = '".$var."'";
            foreach($dbs->query($req,PDO::FETCH_ASSOC) as $res){
                    echo'
            <article class="case">
            <div class="image">
                <img src="ressources/materiel/'.$res["image"].'" alt="pc gaming Dell">
            </div>
            <div class="colonne">
                <div>
                    <h3 class="nom">'.$res["nom"].'</h3>
                </div>
            </div>
            </article>';}}
        ?>   
    <a href='produits.php'><button id="plus" type="button">+</button></a>
    </section>
    <form method="post" action="reserver.php" id="reserver">
        <div id="colonne2">
        <div id="emprunter">
            <label >Date d'emprunt : <input type="date" name="emprunt" class="emprunt"></label>
            <label>Date de retour : <input type="date" name="retour" class="emprunt"></label>
        </div>
        <input type="submit" id="valider" value="Valider">       
        </div>
    </form>
</body>
</html>
<?php
include("connect.php");

session_start();
$court="";
$verifine="";
$existe ="";
$_SESSION['acces'] = "non";

if ($_SESSION['acces']=="oui"){
    header('Location:produits.php');
}

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ine']) && isset($_POST['naissance']) && isset($_POST['email']) && isset($_POST['mdp'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $ine = $_POST['ine'];
    $naissance = $_POST['naissance'];
    $email = strtolower($_POST['email']);
    $mdp = $_POST['mdp'];

    if (strlen($_POST['mdp']) >= 6){
        $mdp = sha1($_POST['mdp']); 
        $mdpverif = 1;
    }
    else{
        $court = "Le mot de passe doit contenir au moins 6 caractères";
        $mdpverif = 0;
    }

    if (strlen($_POST['ine']) == 11){
        $ineverif = 1;
    }
    else{
        $verifine = "Numéro INE incorrect. Il doit faire 11 caractères.";
        $ineverif = 0;
    }

    $requete2 = ("SELECT mail FROM user WHERE mail ='" .$_POST['email']."'");
    $recmail = $dbs->query($requete2);
    $verifmail = $recmail -> fetchAll(PDO::FETCH_ASSOC);
    $nb_mail = count($verifmail);

    if ($nb_mail < 1){
        $mailverif = 1;
    }else{
        $existe = "Cette adresse email est déjà utilisée.";
        $mailverif = 0;
    }

    if ($mailverif == 1 && $ineverif == 1 && $mdpverif == 1){
    $requete = ("INSERT INTO user (nom, prenom, mail, mdp, date, ine, role) VALUES ('$nom', '$prenom', '$email', '$mdp', '$naissance', '$ine', 1)");
    $dbs->query($requete);
    $_SESSION['acces']="oui";
    header('Location:produit.php');
    }
     
}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/inscription.css">
        <link rel="stylesheet" href="style/main.css">
		<title>Inscription</title>
	</head>
    <body>
        <section class="logobl"><img src="ressources/logo_univ.png"></section>
        <section class="rectangle">
            <article class="container">
                <h2>Inscription</h2>
                <a href="index.php" id="connexion">se connecter</a>
                <form id="row" action="inscription.php" method="POST">
                    <article class="col">
                        <article class="inputBox">
                            <input type="text" name="nom" required="required">
                            <span class="text">Nom</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="text" name="prenom" required="required">
                            <span class="text">Prénom</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="text" name="ine" required="required">
                            <span class="text">Numéro INE</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                        <div class="rouge">
                        <?php  
                        echo $verifine; 
                        ?>
                        </div>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="date" name="naissance" >
                            <span class="text">Date de naissance</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="email" name="email" required="required" id="email">
                            <span class="text">Email</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                        <div class="rouge">
                        <?php
                        echo $existe;
                        ?>
                        </div>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="password" name="mdp" required="required">
                            <span class="text">Mot de passe</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>   
                        <div class="rouge">
                        <?php  
                        echo $court; 
                        ?>
                        </div>              
                    </article>
                    <section class="ins"><input type="submit" value="Confirmer" id="bt"><i></i></input></section>
                </form>
            </article>
        </section>
    </body>
</html>
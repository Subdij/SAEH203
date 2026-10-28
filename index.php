<?php
include("connect.php");

session_start();
$erreurconnexion = "";

if(isset($_SESSION['acces'])){

if ($_SESSION['acces']=="oui"){
    header('Location:produits.php');
}
}

if (isset($_POST['email']) && isset($_POST['mdp'])){
    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);

    $requete = ("SELECT mail, mdp, role FROM user");
    $connexion = $dbs->query($requete);

    $verif = $connexion -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($verif as $tableau){
        if (strtolower($email)==strtolower($tableau['mail']) && $mdp==$tableau['mdp']){
            $_SESSION['mail'] = $tableau['mail'];
            $_SESSION['mdp'] = $tableau['mdp'];
            $_SESSION['role'] = $tableau['role'];
            $_SESSION['acces'] = "oui";
            header('Location:produits.php');
            break;
        }else{
            $erreurconnexion = 'Adresse mail ou mot de passe invalide.';
        }
    }

}

?>

<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style/connexion.css">
        <link rel="stylesheet" href="style/main.css">
		<title>Connexion</title>
	</head>
    <body>
        <section class="logobl"><img src="ressources/logo_univ.png"></section>
        <section class="rectangle">
            <article class="container">
                <h2>Connexion</h2>
                <a href="inscription.php" id="inscription">S'inscrire</a>
                <form id="row" action="index.php" method="POST">
                    <article class="col">
                        <article class="inputBox">
                            <input type="email" name="email" required="required" id="email">
                            <span class="text">Email</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                    </article>
                    <article class="col">
                        <article class="inputBox">
                            <input type="password" name="mdp" required="required">
                            <span class="text">Mot de passe</span>
                            <span class="line"></span>
                            <span id="texte"></span>
                        </article>
                    </article>
                    <div id="rouge">
                    <?php
                        echo $erreurconnexion;
                    ?>
                    </div>
                    <section class="ins"><input type="submit" value="S'identifier" id="bt"><i></i></input></section>
                </section>
                </form>
            </article>
        </section>
    </body>
</html>
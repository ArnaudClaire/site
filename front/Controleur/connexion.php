<?php
include_once("Modele/GestionCompte.class.php");

if(isset($_POST["btConnecter"]))
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    // $bdd = new PDO('mysql:host=groupcz34.mysql.db;dbname=groupcz34', 'groupcz34', 'MerMoz2xY', $pdo_options);
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
    $req = $bdd->prepare('SELECT idCpt, pseudoCpt, mdpCpt FROM compte WHERE pseudoCpt = ?');
    $req->execute(array($_POST["pseudoCpt"]));
    $resultat = $req->fetch();

    var_dump($resultat);
    echo(sha1($_POST["mdp"]));

    if($resultat['mdpCpt'] == sha1($_POST["mdp"]) & $_POST["mdp"] != null)
    {            
        $_SESSION['idCpt'] = $resultat['idCpt'];
        $_SESSION['pseudoCpt'] = $resultat['pseudoCpt'];
        $_SESSION['mdpCpt'] = $resultat['mdpCpt'];
        $_SESSION['mdpCptDecrypte'] = $_POST["mdp"];
        echo '<script language="Javascript"> document.location.replace("index.php"); </script>';           
    }

    else 
    {
        echo "<script>alert(\"Identifiant ou mot de passe incorrect !\")</script>";
        include("Vues/connexion.php");
    }        
}
else{
    include("Vues/connexion.php");
}
?>


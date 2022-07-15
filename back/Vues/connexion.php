<link rel="stylesheet" href="Style\connexion.css">


<form id="monform" name="monform" action="index.php?page=connexion" method="POST">
    <div class="login-page">
        <div class="form">
            <form class="login-form">
                
                <h1>Connexion</h1>
                <input type="text" id="idAd" name="idAd" placeholder="Identifiant"/>
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe"/>
                <input type="submit" id="btConnecter" name="btConnecter" value="Se connecter">
            </form>
        </div>
    </div>
</form>

<?php
    if(isset($_POST["btConnecter"]))
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
        $req = $bdd->prepare('SELECT identifiant, mdp FROM administrateur WHERE identifiant = ?');
        $req->execute(array($_POST["idAd"]));
        $resultat = $req->fetch();

        var_dump($resultat);
        echo(sha1($_POST["mdp"]));
        echo($_POST["mdp"]);

        if($resultat['mdp'] == sha1($_POST["mdp"]) & $_POST["mdp"] != null)
        {   
            echo("bite");         
            $_SESSION['idAd'] = $resultat['identifiant'];
            $_SESSION['mdpAd'] = $resultat['mdp'];
            $_SESSION['mdpAdDecrypte'] = $_POST["mdp"];
            echo '<script language="Javascript"> document.location.replace("index.php"); </script>';  
        }
        else 
        {
            echo "<script>alert(\"Identifiant ou mot de passe incorrect !\")</script>";
            var_dump($_SESSION['idAd']);
        }  
        // header('Location: ../index.php');//on renvoie sur la page des informations
        echo "<script>alert(\"Identifiant !\")</script>";      
    }
?>
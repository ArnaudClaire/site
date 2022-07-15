<link rel="stylesheet" href="Style\connexion.css">


<form id="monform" name="monform" action="index.php?page=connexion" method="POST">
    <div class="login-page">
        <div class="form">
            <form class="login-form">
                
                <h1>Connexion</h1>
                <input type="text" id="pseudoCpt" name="pseudoCpt" placeholder="Identifiant" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>"/>
                <input type="password" id="mdp" name="mdp" placeholder="Mot de passe"/>
                <input type="submit" id="btConnecter" name="btConnecter" value="Se connecter">
                <a href="index.php?page=inscription"> <input type="button" id="btConnecter" value="Inscription"></a>
            </form>
        </div>
    </div>
</form>



<?php
echo "<br><br><br>";
if($_GET['manip'] == "ajout")
{
?>    
    <form method="post" action="index.php?page=administrateur" enctype="multipart/form-data">
        <h1>Ajouter un administrateur</h1>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>
                <td>Mot de passe</td>
            </tr>

            <tr>
                <td><input name="newPseudo" type="text" required="require"></td>
                <td><input name="newMdp" type="text" required="require"></td>
            </tr>
        </table>
        <br>     
        <input name="validerAjout" type="submit" value="Ajouter">
        <a href="index.php?page=administrateur"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "modif")
{
    
    ?>    
     <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Mot de passe</td> 
            </tr>
            <tr>
                <td><?php echo $admin[0]->identifiant; ?></td>
                <td><?php echo $admin[0]->mdp; ?></td>
            </tr>
        </table>
    <form method="post" action="index.php?page=administrateur" enctype="multipart/form-data">
        <h1>Modifier un Compte Admin</h1>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Mot de passe</td>
            </tr>

            <tr>
                <td><input name="newPseudo" type="text"></td>
                <td><input name="newMdp" type="text"></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idAd" value="<?php echo $admin[0]->idAd; ?>">
        <input name="validerModification" type="submit" value="Confirmer">
        <a href="index.php?page=administrateur"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "suppr")
{ 
    
    ?>
    <form method="post" action="index.php?page=administrateur">
        <h1>Supprimer un Compte Admin</h1>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Mot de passe</td>         
            </tr>

            <tr>
                <td><?php echo $admin[0]->identifiant; ?></td>
                <td><?php echo $admin[0]->mdp; ?></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idAd" value="<?php echo $admin[0]->idAd; ?>">
        <input name="validerSuppression" type="submit" value="Supprimer">
        <a href="index.php?page=administrateur"><input type="button" value="Annuler"></a>
    </form>
<?php
}
?>
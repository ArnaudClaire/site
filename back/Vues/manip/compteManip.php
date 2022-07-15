<?php
echo "<br><br><br>";
if($_GET['manip'] == "ajout")
{
?>    
    <form method="post" action="index.php?page=compte" enctype="multipart/form-data">
        <h1>Ajouter un compte</h1>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Civilit&eacute;</td>                
                <td>Nom</td>
                <td>Pr&eacute;nom</td>
                <td>Date de Naissance</td>
                <td>Adresse</td>
                <td>Code Postal</td>
                <td>Ville</td>
                <td>Mail</td>
                <td>Mot de passe</td>
            </tr>

            <tr>
                <td><input name="newPseudo" type="text" required="require"></td>
                <td>
                    <label for="tCiv"></label>
                    <select name="newCiv" id="tCiv">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </td>
                <td><input name="newNom" type="text" required="require"></td>                
                <td><input name="newPrenom" type="text" required="require"></td>
                <td><input name="newDateNaiss" type="date" required="require"></td>
                <td><input name="newAd" type="text" required="require"></td>
                <td><input name="newCp" type="text" required="require"></td>
                <td><input name="newVille" type="text" required="require"></td>
                <td><input name="newMail" type="email" required="require"></td>
                <td><input name="newMdp" type="text" required="require"></td>
            </tr>
        </table>
        <br>     
        <input name="validerAjout" type="submit" onclick="validation()" value="Ajouter">
        <a href="index.php?page=compte"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "modif")
{
    
    ?>    
     <table>
            <tr id="headerCell">
                <td>Id</td>  
                <td>Identifiant</td>  
                <td>Civilit&eacute;</td>                
                <td>Nom</td>
                <td>Pr&eacute;nom</td>
                <td>Date de Naissance</td>
                <td>Adresse</td>
                <td>Code Postal</td>
                <td>Ville</td>
                <td>Mail</td>
                <td>Mot de passe</td> 
            </tr>
            <tr>
                <td><?php echo $leCompte[0]->idCpt; ?></td>
                <td><?php echo $leCompte[0]->pseudoCpt; ?></td>
                <td><?php echo $leCompte[0]->civCpt; ?></td>
                <td><?php echo $leCompte[0]->nomCpt; ?></td>
                <td><?php echo $leCompte[0]->prenomCpt; ?></td>
                <td><?php echo $leCompte[0]->dateNaissCpt; ?></td>
                <td><?php echo $leCompte[0]->adCpt; ?></td>
                <td><?php echo $leCompte[0]->cpCpt; ?></td>
                <td><?php echo $leCompte[0]->villeCpt; ?></td>
                <td><?php echo $leCompte[0]->mailCpt; ?></td>
                <td><?php echo $leCompte[0]->mdpCpt; ?></td>
            </tr>
        </table>
    <form method="post" action="index.php?page=compte" enctype="multipart/form-data">
        <h1>Modifier un compte</h1>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Civilit&eacute;</td>                
                <td>Nom</td>
                <td>Pr&eacute;nom</td>
                <td>Date de Naissance</td>
                <td>Adresse</td>
                <td>Code Postal</td>
                <td>Ville</td>
                <td>Mail</td>
                <td>Mot de passe</td>
            </tr>

            <tr>
                <td><input name="newPseudo" type="text"></td>
                <td>
                    <label for="tCiv"></label>
                    <select name="newCiv" id="tCiv">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </td>
                <td><input name="newNom" type="text"></td>                
                <td><input name="newPrenom" type="text"></td>
                <td><input name="newDateNaiss" type="date"></td>
                <td><input name="newAd" type="text"></td>
                <td><input name="newCp" type="text"></td>
                <td><input name="newVille" type="text"></td>
                <td><input name="newMail" type="email"></td>
                <td><input name="newMdp" type="text"></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idCpt" value="<?php echo $leCompte[0]->idCpt; ?>">
        <input name="validerModification" type="submit" value="Confirmer">
        <a href="index.php?page=compte"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "suppr")
{ 
    
    ?>
    <form method="post" action="index.php?page=compte">
        <h1>Supprimer un compte</h1>
        <table>
            <tr id="headerCell">
                <td>Id</td>  
                <td>Identifiant</td>  
                <td>Civilit&eacute;</td>                
                <td>Nom</td>
                <td>Pr&eacute;nom</td>
                <td>Date de Naissance</td>
                <td>Adresse</td>
                <td>Code Postal</td>
                <td>Ville</td>
                <td>Mail</td>
                <td>Mot de passe</td>         
            </tr>

            <tr>
                <td><?php echo $leCompte[0]->idCpt; ?></td>
                <td><?php echo $leCompte[0]->pseudoCpt; ?></td>
                <td><?php echo $leCompte[0]->civCpt; ?></td>
                <td><?php echo $leCompte[0]->nomCpt; ?></td>
                <td><?php echo $leCompte[0]->prenomCpt; ?></td>
                <td><?php echo $leCompte[0]->dateNaissCpt; ?></td>
                <td><?php echo $leCompte[0]->adCpt; ?></td>
                <td><?php echo $leCompte[0]->cpCpt; ?></td>
                <td><?php echo $leCompte[0]->villeCpt; ?></td>
                <td><?php echo $leCompte[0]->mailCpt; ?></td>
                <td><?php echo $leCompte[0]->mdpCpt; ?></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idCpt" value="<?php echo $leCompte[0]->idCpt; ?>">
        <input name="validerSuppression" type="submit" value="Supprimer">
        <a href="index.php?page=compte"><input type="button" value="Annuler"></a>
    </form>
<?php
}
?>
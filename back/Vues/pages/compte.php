<form>             
    <h1>Liste des comptes</h1>

    <?php 
    if(isset($lesComptes))
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
                <td>Modification</td>
                <td>Suppression</td>
            </tr>

            <?php 
            foreach($lesComptes as $unCompte)
            {
            ?>
                <tr>
                    <td><?php echo $unCompte->idCpt; ?></td>
                    <td><?php echo $unCompte->pseudoCpt; ?></td>
                    <td><?php echo $unCompte->civCpt; ?></td>
                    <td><?php echo $unCompte->nomCpt; ?></td>
                    <td><?php echo $unCompte->prenomCpt; ?></td>
                    <td><?php echo $unCompte->dateNaissCpt; ?></td>
                    <td><?php echo $unCompte->adCpt; ?></td>
                    <td><?php echo $unCompte->cpCpt; ?></td>
                    <td><?php echo $unCompte->villeCpt; ?></td>
                    <td><?php echo $unCompte->mailCpt; ?></td>
                    <td><?php echo $unCompte->mdpCpt; ?></td>
                    <td><?php echo "<a href='index.php?page=manip/compteManip&manip=modif&idCpt=".$unCompte->idCpt."'><input type='button' value='Modification'></a>";?></td>
                    <td><?php echo "<a href='index.php?page=manip/compteManip&manip=suppr&idCpt=".$unCompte->idCpt."'><input type='button' value='Suppression'></a>";?></td>
                </tr>
            <?php             
            } 
            ?>
        </table>
    <?php         
    }

    else
    {
        echo "<h1>Il n'y a pas de comptes.</h1>";
    }
    ?>
</form>
<form>             
    <h1>Liste des comptes</h1>

    <?php 
    if(isset($lesAdmins))
    { 
    ?>
        <table>
            <tr id="headerCell">
                <td>Identifiant</td>  
                <td>Mot de passe</td> 
                <td>Modification</td>
                <td>Suppression</td>
            </tr>

            <?php 
            foreach($lesAdmins as $unAdmin)
            {
            ?>
                <tr>
                    <td><?php echo $unAdmin->identifiant; ?></td>
                    <td><?php echo $unAdmin->mdp; ?></td>
                    <td><?php echo "<a href='index.php?page=manip/adminManip&manip=modif&idAd=".$unAdmin->idAd."'><input type='button' value='Modification'></a>";?></td>
                    <td><?php echo "<a href='index.php?page=manip/adminManip&manip=suppr&idAd=".$unAdmin->idAd."'><input type='button' value='Suppression'></a>";?></td>
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
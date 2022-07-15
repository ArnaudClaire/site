<?php
echo "<br><br><br>";
if($_GET['manip'] == "ajout")
{
    ?>
    <form method="post" action="index.php?page=categorie" enctype="multipart/form-data">
        <h1>Ajouter une Cat&eacute;gorie</h1>
        <table>
            <tr id="headerCell">
                <td>Nom/Libell&eacute;</td>                
            </tr>
            
            <tr>
                <td><input name="newLib" type="text" required="require"></td>                  
            </tr>
        </table>
        <br>
        <input name="validerAjout" type="submit" value="Ajouter">
        <a href="index.php?page=categorie"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "modif")
{
    
    ?>
    <form method="post" action="index.php?page=categorie" enctype="multipart/form-data">
        <h1>Modifier une Cat&eacute;gorie</h1>
        <table>
            <tr id="headerCell">
                <td>Nom/Libell&eacute;</td>                
            </tr>
            
            <tr>
                <td><input name="newLib" type="text" required="require"></td>                  
            </tr>
        </table>
        <br>
        <input type="hidden" name="idCateg" value="<?php echo $laCategorie[0]->idCateg; ?>">
        <input name="validerModification" type="submit" value="Confirmer">
        <a href="index.php?page=categorie"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "suppr")
{ 
    include("Controleur/lesFigurinesDeLaCategorie.php");
    if(isset($laCategorie)){
    ?>  
    <form method="post" action="index.php?page=categorie">
        <h1>Supprimer la Cat&eacute;gorie</h1>
        <table>
            <tr id="headerCell">
                <td>Nom/Libell&eacute;</td>                
            </tr>
            
            <tr>
                <td><?php echo $laCategorie[0]->libCateg; ?></td>                 
            </tr>
        </table>
        <?php
        if(isset($lesFigurines) && empty($lesFigurines)!=1){
                
        ?>
        <h1>Entra&icirc;nera &eacute;galement la suppression des Figurines suivantes</h1><br>
        <table>
            <tr id="headerCell">
                <td>Id</td>
                <td>Nom</td>
                <td>Image Figurine</td>
                <td>Description</td>    
                <td>Taille</td>    
                <td>Editeur</td>
            </tr>

            <?php 
            foreach($lesFigurines as $uneFigurine)
            { 
            ?>
                <tr>
                    <td><?php echo $uneFigurine->idFig; ?></td>
                    <td><?php echo $uneFigurine->nomFig; ?></td>
                    <td><img src="<?php echo $uneFigurine->cheminImageFig; ?>"></td>
                    <td><?php echo $uneFigurine->descriptionFig; ?></td>
                    <td><?php echo $uneFigurine->tailleFig; ?></td>
                    <td><?php echo $uneFigurine->editeurFig; ?></td>
                </tr>
            <?php                     
            } 
            ?>
        </table>
        <?php
        }
        else{
            ?>
            <h1>N'entra&icirc;nera la suppression d'aucune Figurines</h1><br>
            <?php
        }
        ?>
        <br>
        <input type="hidden" name="idCateg" value="<?php echo $laCategorie[0]->idCateg; ?>">
        <input name="validerSuppression" type="submit" value="Supprimer">
        <a href="index.php?page=categorie"><input type="button" value="Annuler"></a>
    </form>
    <?php
    }
    else{
        ?>
        <h1>La Cat&eacute;gorie Selectionnée n'existe pas ou ne peut être supprim&eacute;e </h1>
        <a href="index.php?page=categorie"><input type="button" value="revenir"></a>
        <?php
    }
    ?>
<?php
}
?>
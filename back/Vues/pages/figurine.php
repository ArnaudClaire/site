<form>
    <h1>Liste des Figurines</h1>

    <?php 
    if(isset($lesFigurines))
    { 
    ?>
        <table>
            <tr id="headerCell">
                <td>Id</td>
                <td>Nom</td>
                <td>Image Figurine</td>
                <td>Description</td>    
                <td>Taille</td>    
                <td>Editeur</td> 
                <td>Prix</td> 
                <td>Categorie</td>                  
                <td>Modification</td>
                <td>Suppression</td>
            </tr>

            <?php 
            foreach($lesFigurines as $uneFigurine)
            { 
                include("Controleur/laCategorieDeLaFigurine.php");
            ?>
                <tr>
                    <td><?php echo $uneFigurine->idFig; ?></td>
                    <td><?php echo $uneFigurine->nomFig; ?></td>
                    <td><img src="<?php echo $uneFigurine->cheminImageFig; ?>"></td>
                    <td><?php echo $uneFigurine->descriptionFig; ?></td>
                    <td><?php echo $uneFigurine->tailleFig; ?></td>
                    <td><?php echo $uneFigurine->editeurFig; ?></td>
                    <td><?php echo $uneFigurine->prixFig."€"; ?></td>
                    <td><?php echo $laCategorie[0]->libCateg; ?></td>
                    <td><?php echo "<a href='index.php?page=manip/figurineManip&manip=modif&idFig=".$uneFigurine->idFig."'><input type='button' value='Modification'></a>";?></td>
                    <td><?php echo "<a href='index.php?page=manip/figurineManip&manip=suppr&idFig=".$uneFigurine->idFig."'><input type='button' value='Suppression'></a>";?></td>
                </tr>
            <?php                     
            } 
            ?>
        </table>
    <?php 
    }

    else
    {
        echo "<h1>Il n'y a pas de figurines.</h1>";
    }
    ?>
</form>
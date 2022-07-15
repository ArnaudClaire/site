<?php

echo "<br><br><br>";
if($_GET['manip'] == "ajout")
{
    ?>
    <form method="post" action="index.php?page=figurine" enctype="multipart/form-data">
        <h1>Ajouter une Figurine</h1>
        <table>
            <tr id="headerCell">        
                <td>Nom</td>
                <td>Image Figurine</td>
                <td>Description</td>    
                <td>Taille</td>    
                <td>Editeur</td> 
                <td>Prix</td>
                <td>Categorie</td>               
            </tr>

            <tr>
                <td><input name="newNom" type="text" required="require"></td>                
                <td><input name="newImage" type="file" required="require" /></td>  
                <td><input name="newDescription" type="textarea" maxlength="500" required="require"></td>  
                <td><input name="newTaille" type="number" placeholder="Valeur en cm" min="0" required="require"></td>    
                <td><input name="newEditeur" type="text"></td>    
                <td><input name="newPrix" type="number" placeholder="Valeur en €" max="1000" min="0" step="0.01" required="require"></td>  
                <td>
                    <select name="newIdCateg" id="newCateg">
                        <?php
                        foreach($lesCategories as $uneCategorie)
                        {
                            echo "<option value=".$uneCategorie->idCateg.">".$uneCategorie->libCateg."</option>";      
                        }
                        ?>
                    </select>
                </td>              
            </tr>
        </table>
        <br>
        <input name="validerAjout" type="submit" value="Ajouter">
        <a href="index.php?page=figurine"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "modif")
{
    include("Controleur/laCategorieDeLaFigurine.php");
    ?><table>
    <tr id="headerCell">
        <td>Id</td>
        <td>Nom</td>
        <td>Image Figurine</td>
        <td>Description</td>    
        <td>Taille</td>    
        <td>Editeur</td> 
        <td>Prix</td> 
        <td>Categorie</td>                  
    </tr>
    <tr>
        <td><?php echo $laFigurine[0]->idFig; ?></td>
        <td><?php echo $laFigurine[0]->nomFig; ?></td>
        <td><img src="<?php echo $laFigurine[0]->cheminImageFig; ?>"></td>
        <td><?php echo $laFigurine[0]->descriptionFig; ?></td>
        <td><?php echo $laFigurine[0]->tailleFig; ?></td>
        <td><?php echo $laFigurine[0]->editeurFig; ?></td>
        <td><?php echo $laFigurine[0]->prixFig."€"; ?></td>
        <td><?php echo $laCategorie[0]->libCateg; ?></td>
    </tr>
    </table>
    <form method="post" action="index.php?page=figurine" enctype="multipart/form-data">
        <h1>Modifier une Figurine</h1>
            <table>
            <tr id="headerCell">        
                <td>Nom</td>
                <td>Image Figurine</td>
                <td>Description</td>    
                <td>Taille</td>    
                <td>Editeur</td> 
                <td>Prix</td>
                <td>Categorie</td>               
            </tr>

            <tr>
                <td><input name="newNom" type="text"></td>                
                <td><input name="newImage" type="file" /></td>  
                <td><input name="newDescription" type="textarea" maxlength="500" ></td>  
                <td><input name="newTaille" type="number" placeholder="Valeur en cm" min="0" ></td>    
                <td><input name="newEditeur" type="text"></td> 
                <td><input name="newPrix" type="number" placeholder="Valeur en €" min="0" step="0.01"></td>  
                <td>
                    <select name="newIdCateg" id="newCateg">
                        <?php
                        foreach($lesCategories as $uneCategorie)
                        {
                            echo "<option value=".$uneCategorie->idCateg.">".$uneCategorie->libCateg."</option>";      
                        }
                        ?>
                    </select>
                </td>              
            </tr>
        </table>
        <br>
        <input type="hidden" name="idFig" value="<?php echo $laFigurine[0]->idFig; ?>">
        <input name="validerModification" type="submit" value="Modifier">
        <a href="index.php?page=figurine"><input type="button" value="Annuler"></a>
    </form>
<?php
}

else if($_GET['manip'] == "suppr")
{ 
    
    include("Controleur/laCategorieDeLaFigurine.php");
    ?>
    <form method="post" action="index.php?page=figurine">
        <h1>Supprimer une Figurine</h1>
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
            </tr>
            <tr>
                <td><?php echo $laFigurine[0]->idFig; ?></td>
                <td><?php echo $laFigurine[0]->nomFig; ?></td>
                <td><img src="<?php echo $laFigurine[0]->cheminImageFig; ?>"></td>
                <td><?php echo $laFigurine[0]->descriptionFig; ?></td>
                <td><?php echo $laFigurine[0]->tailleFig; ?></td>
                <td><?php echo $laFigurine[0]->editeurFig; ?></td>
                <td><?php echo $laFigurine[0]->prixFig; ?></td>
                <td><?php echo $laCategorie[0]->libCateg; ?></td>
            </tr>
        </table>
        <br>
        <input type="hidden" name="idFig" value="<?php echo $laFigurine[0]->idFig; ?>">
        <input name="validerSuppression" type="submit" value="Supprimer">
        <a href="index.php?page=figurine"><input type="button" value="Annuler"></a>
    </form>
<?php
}
?>
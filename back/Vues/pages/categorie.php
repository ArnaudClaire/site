<form>
    <h1>Liste des Cat&eacute;gories</h1>

    <?php 
    if(isset($lesCategories))
    { 
    ?>
        <table>
            <tr id="headerCell">
                <td>Id</td>
                <td>Libellé</td>          
                <td>Modification</td>
                <td>Suppression</td>
            </tr>

            <?php 
            foreach($lesCategories as $uneCategorie)
            { 
            ?>
                <tr>
                    <td><?php echo $uneCategorie->idCateg; ?></td> 
                    <td><?php echo $uneCategorie->libCateg; ?></td>                 
                    <td><?php echo "<a href='index.php?page=manip/categorieManip&idCateg=".$uneCategorie->idCateg."&manip=modif'><input type='button' value='Modification'></a>";?></td>
                    <td><?php echo "<a href='index.php?page=manip/categorieManip&idCateg=".$uneCategorie->idCateg."&manip=suppr'><input type='button' value='Suppression'></a>";?></td>
                </tr>
            <?php                 
            } 
            ?>
        </table>
    <?php         
    }

    else
    {
        echo "<h1>Il n'y a pas de Catégorie.</h1>";
    }
    ?>
</form>
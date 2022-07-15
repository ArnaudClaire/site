<div id="pDtlCmd">
        <?php 
        if(isset($lesDtls))
        { 
        ?>
            <table>
                <tr id="headerCell">
                    <td></td>  
                    <td></td>       
                    <td>Prix</td>  
                    <td>Quantit&eacute;</td>           
                </tr>
                <?php 
                foreach($lesDtls as $unDtl)
                { 
                include("Controleur/laFigurineDuDetail.php");
                ?>
                    <tr>     
                        <td><img src="<?php echo $laFigurine[0]->cheminImageFig; ?>"></td>
                        <td>
                            <h1><?php echo $laFigurine[0]->nomFig; ?></h1>
                            <p><u>DESCRIPTION</u> : <?php echo $laFigurine[0]->descriptionFig; ?></p>
                            <br>
                            <?php echo 'Taille : '.$laFigurine[0]->tailleFig.'cm'; ?>
                            <br>
                            <?php echo $laFigurine[0]->editeurFig; ?>
                            
                        </td>
                        <td>
                            <?php echo $laFigurine[0]->prixFig."€"; ?>
                        </td>
                        <td><?php echo $unDtl->qte; ?></td>
                    </tr>
                <?php                     
                } 
                ?>
            </table>
        <?php 
        }

        else
        {
            echo "<h1>Vous n'avez pas encore commandé.</h1>";
        }
        ?>
</div>
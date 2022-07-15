<div id="pCmd">
        <?php 
        if(isset($lesCommandes))
        { 
        ?>
            <table>
                <tr id="headerCell">
                    <td>Date</td>  
                    <td>D&eacute;tail de la Commande</td>                
                </tr>
                <?php 
                foreach($lesCommandes as $uneCommande)
                { 
                ?>
                    <tr>     
                        <td><?php echo $uneCommande->dateCmd; ?></td>
                        <td>
                            <a href="index.php?page=detailCmd&idCmd=<?php echo $uneCommande->idCmd; ?>"> <input type="button" value="Voir"></a>
                        </td>
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
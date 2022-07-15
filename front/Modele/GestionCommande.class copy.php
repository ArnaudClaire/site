<?php
include("Commande.class.php");
class GestionCommande
{
    public static function SupprimerCommande($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM commande WHERE idCmd= ?;');
            $reponse->execute(array($id));
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }      
    }    

    public static function GetCommande($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            
            if($id==0)
            {
                $reponse = $bdd->query("SELECT * FROM commande ;");
            }
            else 
            {
                $reponse = $bdd->prepare("SELECT * FROM commande WHERE idCmd=?;");
                $reponse->execute(array($id));
            }  
             
            while($ligne= $reponse->fetch()) 
            {
                $id=$ligne['idCmd'];
                $date=$ligne['dateCmd'];
                $idCpt=$ligne['idCpt'];

                $nouvelleCmd = new Commande($id,$date,$idCpt);  

                $commandesDonnees[]=$nouvelleCmd;
            }

            $reponse->closeCursor();  
            if(isset($commandesDonnees)){
                return $commandesDonnees;   
            }      
        }  
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
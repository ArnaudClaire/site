<?php
include("DtlCommande.class.php");
class GestionDtlCommande
{
    public static function AjouterDtlCommande($idFig,$idCmd,$qt)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("INSERT INTO detailcommande (idFig,idCmd,quantite) VALUES (?,?,?);");
            $reponse->execute(array($idFig,$idCmd,$qt));
            $reponse->closeCursor(); 
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }     
    }    

    public static function GetDtlCommandeByCmd($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);

            $reponse = $bdd->prepare("SELECT * FROM detailcommande WHERE idCmd=?;");
            $reponse->execute(array($id));  
             
            while($ligne= $reponse->fetch()) 
            {
                $id=$ligne['idDtlCmd'];
                $idFig=$ligne['idFig'];
                $idCmd=$ligne['idCmd'];
                $qt=$ligne['quantite'];

                $nouveauDtlCmd = new DetailCommande($id,$idFig,$idCmd,$qt);  

                $detailCommandesDonnees[]=$nouveauDtlCmd;
            }

            $reponse->closeCursor();  
            if(isset($detailCommandesDonnees)){
                return $detailCommandesDonnees;   
            }      
        }  
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
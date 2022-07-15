<?php
include("Commande.class.php");
class GestionCommande
{
    public static function AjouterCommande($date,$idCpt)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("INSERT INTO commande (dateCmd,idCpt) VALUES (?,?);");
            $reponse->execute(array($date,$idCpt));
            $reponse->closeCursor(); 
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }    

    //recupere le dernier idCmd des commandes
    public static function GetIdDerniereCommande()
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            
            $reponse = $bdd->query("SELECT * FROM commande ;");

            while($ligne= $reponse->fetch()) 
            {
                $id=$ligne['idCmd'];
            } 

            $idDerniereCommande=$id;

            $reponse->closeCursor();  
            return $idDerniereCommande;         
        }  
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetCommandeByCpt($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            
            $reponse = $bdd->prepare("SELECT * FROM commande WHERE idCpt=?;");
            $reponse->execute(array($id)); 
             
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
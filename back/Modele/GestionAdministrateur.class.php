<?php

include("Administrateur.class.php");
class GestionAdministrateur
{
    public static function SupprimerAdministrateur($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM administrateur WHERE idAd= ?;');
            $reponse->execute(array($id));
            $reponse->closeCursor();
            return 0;
        }

        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }      
    }    

    public static function ModifierAdministrateur($unId, $unIdentifiant, $unMdp)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("UPDATE administrateur SET identifiant=?, mdp=? WHERE idAd= ? ;");
            $reponse->execute(array($unIdentifiant, sha1($unMdp), $unId)); 
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }
	

    public static function AjouterAdministrateur($unIdentifiant,$unMdp)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("INSERT INTO administrateur (identifiant,mdp) VALUES (?,?);");
            $reponse->execute(array($unIdentifiant, sha1($unMdp)));
            $reponse->closeCursor();  
            return 0;
        }
            
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetAdministrateur($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            if($id==0) 
            {
                $reponse = $bdd->query("SELECT * FROM administrateur;");
            }            
            else 
            {
                $reponse = $bdd->prepare("SELECT * FROM administrateur WHERE idAd=?;");
                $reponse->execute(array($id));
            }
            $lesAdmins=array();
            while($ligne= $reponse->fetch())  
            {
                $idAd=$ligne['idAd'];
                $identifiant=$ligne['identifiant'];
                $mdp=$ligne['mdp'];

                $nouveauAdmin = new Administrateur($idAd,$identifiant,$mdp);  

                $lesAdmins[]=$nouveauAdmin;  
            }
            $reponse->closeCursor();  
            return $lesAdmins; 
        }
            
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
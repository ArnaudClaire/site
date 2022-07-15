<?php
include_once("Categorie.class.php");
class GestionCategorie
{
    public static function SupprimerCategorie($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM categorie WHERE idCateg= ?;');
            $reponse->execute(array($id));
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }      
    }    

    public static function ModifierCategorie($id,$lib)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("UPDATE categorie SET libCateg= ? WHERE idCateg= ? ;");
            $reponse->execute(array($lib,$id));
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }
	

    public static function AjouterCategorie($libelle)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("INSERT INTO categorie (libCateg) VALUES (?);");
            $reponse->execute(array($libelle));
            $reponse->closeCursor(); 
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetCategorie($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            
            if($id==0)
            {
                $reponse = $bdd->query("SELECT * FROM categorie ;");
            }
            else 
            {
                $reponse = $bdd->prepare("SELECT * FROM categorie WHERE idCateg=?;");
                $reponse->execute(array($id));
            }  
             
            while($ligne= $reponse->fetch()) 
            {
                $id=$ligne['idCateg'];
                $libelle=$ligne['libCateg'];

                $nouvelleCateg = new Categorie($id,$libelle);  

                $categoriesDonnees[]=$nouvelleCateg;
            }

            $reponse->closeCursor();  
            if(isset($categoriesDonnees)){
                return $categoriesDonnees;   
            }      
        }  
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
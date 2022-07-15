<?php
include("Figurine.class.php");
class GestionFigurine
{
    //Supprime une Figurine dans la BDD.
    public static function SupprimerFigurine($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM figurine WHERE idFig= ?;');
            $reponse->execute(array($id));
            $reponse->closeCursor(); 
            return 0;
        }
            
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }      
    }    

    //Modifie une Figurine dans la BDD.
    public static function ModifierFigurine($unId, $unNom, $unChemin, $uneDescription, $uneTaille, $unEditeur, $unPrix, $uneCateg)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("UPDATE figurine SET nomFig= ?, cheminImageFig=?, descriptionFig=?, tailleFig=?, editeurFig=?, prixFig=?, idCateg=? WHERE idFig= ? ;");
            $reponse->execute(array($unNom, $unChemin, $uneDescription, $uneTaille, $unEditeur, $unPrix, $uneCateg, $unId));
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }
	
    //Ajoute une Figurine à la BDD.
    public static function AjouterFigurine($unNom, $unChemin, $uneDescription, $uneTaille, $unEditeur, $unPrix, $uneCateg)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);            
            
            $reponse = $bdd->prepare("INSERT INTO figurine (nomFig, cheminImageFig, descriptionFig, tailleFig, editeurFig, prixFig, idCateg) VALUES (?,?,?,?,?,?,?);");
            $reponse->execute(array($unNom, $unChemin, $uneDescription, $uneTaille, $unEditeur, $unPrix, $uneCateg));
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    //Donne la liste de toute les Figurines.
    public static function GetFigurine($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $lesFigurines=array();

            if($id==0)
            {
                $reponse = $bdd->query("SELECT * from figurine;");
            }
            else
            {
                $reponse = $bdd->prepare("SELECT * from figurine WHERE idFig=?;");
                $reponse->execute(array($id));
            }  

            while($ligne= $reponse->fetch())
            {
                $id=$ligne['idFig'];
                $nom=$ligne['nomFig'];
                $chemin=$ligne['cheminImageFig'];
                $description=$ligne['descriptionFig'];
                $taille=$ligne['tailleFig'];
                $editeur=$ligne['editeurFig'];
                $prix=$ligne['prixFig'];
                $categ=$ligne['idCateg'];

                $nouvelleFigurine = new Figurine($id, $nom, $chemin, $description, $taille, $editeur, $prix, $categ);  

                $lesFigurines[]=$nouvelleFigurine;  
            }    
            $reponse->closeCursor(); 
            if(isset($lesFigurines)){
                return $lesFigurines;   
            } 
             
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    //Donne la liste des figurines selon la Catégorie.
    public static function GetFigurineByCateg($idCateg)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);

            $reponse = $bdd->prepare("SELECT * from figurine WHERE idCateg=?;");
            $reponse->execute(array($idCateg));
            $lesFigurines=array();

            while($ligne= $reponse->fetch())
            {
                $id=$ligne['idFig'];
                $nom=$ligne['nomFig'];
                $chemin=$ligne['cheminImageFig'];
                $description=$ligne['descriptionFig'];
                $taille=$ligne['tailleFig'];
                $editeur=$ligne['editeurFig'];
                $prix=$ligne['prixFig'];
                $categ=$ligne['idCateg'];

                $nouvelleFigurine = new Figurine($id, $nom, $chemin, $description, $taille, $editeur, $prix, $categ);  

                $lesFigurines[]=$nouvelleFigurine;  
            }    
            $reponse->closeCursor();  
            return $lesFigurines;  
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
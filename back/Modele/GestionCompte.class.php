<?php

include("Compte.class.php");
class GestionCompte
{
    public static function SupprimerCompte($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare('DELETE FROM compte WHERE idCpt= ?;');
            $reponse->execute(array($id));
            $reponse->closeCursor();
            return 0;
        }

        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }      
    }    

    //modifie le compte en changeant le mot de passe
    public static function ModifierCompte($unId, $uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, $unMdp)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("UPDATE compte SET civCpt=?, nomCpt= ?, prenomCpt=?, pseudoCpt=?, dateNaissCpt=?, adCpt=?, cpCpt=?, villeCpt=?, mailCpt=?, mdpCpt=? WHERE idCpt= ? ;");
            $reponse->execute(array($uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, sha1($unMdp), $unId)); 
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }
	
    //modifie le compte sans changer le mot de passe
    public static function ModifierCompteSaufMdp($unId, $uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("UPDATE compte SET civCpt=?, nomCpt= ?, prenomCpt=?, pseudoCpt=?, dateNaissCpt=?, adCpt=?, cpCpt=?, villeCpt=?, mailCpt=? WHERE idCpt= ? ;");
            $reponse->execute(array($uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, $unId)); 
            $reponse->closeCursor();
            return 0;
        }
            
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }

    public static function AjouterCompte($uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, $unMdp)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            $reponse = $bdd->prepare("INSERT INTO compte (civCpt,nomCpt,prenomCpt,pseudoCpt,dateNaissCpt,adCpt,cpCpt,villeCpt,mailCpt,mdpCpt) VALUES (?,?,?,?,?,?,?,?,?,?);");
            $reponse->execute(array($uneCiv, $unNom, $unPrenom, $unPseudo, $uneDateNaiss, $uneAd, $unCp, $uneVille, $unMail, sha1($unMdp)));
            $reponse->closeCursor();  
            return 0;
        }
            
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }

    public static function GetCompte($id)
    {
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=127.0.0.1;dbname=baseproduit', 'root', '', $pdo_options);
            
            if($id==0) 
            {
                $reponse = $bdd->query("SELECT * FROM compte;");
            }            
            else 
            {
                $reponse = $bdd->prepare("SELECT * FROM compte WHERE idCpt=?;");
                $reponse->execute(array($id));
            }
            $lesComptes=array();
            while($ligne= $reponse->fetch())  
            {
                $id=$ligne['idCpt'];
                $civ=$ligne['civCpt'];
                $nom=$ligne['nomCpt'];
                $prenom=$ligne['prenomCpt'];
                $pseudo=$ligne['pseudoCpt'];
                $dateNaiss=$ligne['dateNaissCpt'];
                $ad=$ligne['adCpt'];
                $cp=$ligne['cpCpt'];
                $ville=$ligne['villeCpt'];
                $mail=$ligne['mailCpt'];
                $mdp=$ligne['mdpCpt'];

                $nouveauCompte = new Compte($id, $civ, $nom, $prenom, $pseudo, $dateNaiss, $ad, $cp, $ville, $mail, $mdp);  

                $lesComptes[]=$nouveauCompte;  
            }
            $reponse->closeCursor();  
            return $lesComptes; 
        }
            
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
} 
?>
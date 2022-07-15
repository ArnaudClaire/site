<?php

    //création du panier avec des tableau pour accumuler les informations(libelles, quantités et prix) 
    //ainsi qu'un verrou (booleen) pour vérouiller le panier et enregistré la commande dans l'historique.
    //retourne true si le panier est créé sinon false s'il existé déjà.
    function CreationPanier(){
        $retour=true;
        if(isset($_SESSION['panier']))
        {
            $retour=false;
        }
        else{
            $_SESSION['panier']=array();
            $_SESSION['panier']['idFig'] = array();
            $_SESSION['panier']['qteFig'] = array();
            $_SESSION['panier']['prixFig'] = array();
            $_SESSION['panier']['verrou'] = false;//on vérouille le panier quand on paye à la fin.
        }
        return $retour;
    }
    function AjouterArticle($idFig,$qteFig,$prixFig){
        //Si le panier existe
        if (!CreationPanier() && !IsVerrouille())
        {
            //Si le produit existe déjà on ajoute seulement la quantité
            $positionProduit = array_search($idFig,  $_SESSION['panier']['idFig']);
        
            if ($positionProduit !== false)
            {
                $_SESSION['panier']['qteFig'][$positionProduit] += $qteFig ;
            }
            else
            {
                //Sinon on ajoute le produit
                array_push( $_SESSION['panier']['idFig'],$idFig);
                array_push( $_SESSION['panier']['qteFig'],$qteFig);
                array_push( $_SESSION['panier']['prixFig'],$prixFig);
            }
        }
        else
        {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }

    function SupprimerArticle($idFig){
        //Si le panier existe
        if (!CreationPanier() && !IsVerrouille())
        {
            //Nous allons passer par un panier temporaire
            $tmp=array();
            $tmp['idFig'] = array();
            $tmp['qteFig'] = array();
            $tmp['prixFig'] = array();
            $tmp['verrou'] = $_SESSION['panier']['verrou'];
        
            for($i = 0; $i < count($_SESSION['panier']['idFig']); $i++)
            {
                if ($_SESSION['panier']['idFig'][$i] !== $idFig)
                {
                    array_push( $tmp['idFig'],$_SESSION['panier']['idFig'][$i]);
                    array_push( $tmp['qteFig'],$_SESSION['panier']['qteFig'][$i]);
                    array_push( $tmp['prixFig'],$_SESSION['panier']['prixFig'][$i]);
                }
        
            }
            //On remplace le panier en session par notre panier temporaire à jour
            $_SESSION['panier'] =  $tmp;
            //On efface notre panier temporaire
            unset($tmp);
        }
        else
        {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }

    //modifie la quantité (ajoute ou supprime un produit)
    function ModifierQTeArticle($idFig,$qteFig){
        //Si le panier existe
        if (!CreationPanier() && !IsVerrouille())
        {
           //Si la quantité est positive on modifie sinon on supprime l'article
           if ($qteFig > 0)
           {
              //Recherche du produit dans le panier
              $positionProduit = array_search($idFig,  $_SESSION['panier']['idFig']);
     
              if ($positionProduit !== false)
              {
                 $_SESSION['panier']['qteFig'][$positionProduit] = $qteFig ;
              }
           }
           else{
                SupprimerArticle($idFig);
           }
           
        }
        else
        {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }

    //calcul le montant final
    function MontantGlobal(){
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['idFig']); $i++)
        {
           $total += $_SESSION['panier']['qteFig'][$i] * $_SESSION['panier']['prixFig'][$i];
        }
        return $total;
    }    

    //vérifie si le panier est vérouillé
    //retourne true si le panier est vérouillé
    function IsVerrouille(){
        $retour=false;
        if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou']){
            $retour=true;
        }
        return $retour;
    }

    //Compte le nombre de figurine achetée
    function CompterArticles()
    {
        $nbArticles=0;
        if (isset($_SESSION['panier'])){
            $nbArticles=count($_SESSION['panier']['idFig']);
        }
        return $nbArticles;
    }

    //supprime le panier
    function SupprimePanier(){
        unset($_SESSION['panier']);
    } 
?>
<?php

    //création du panier avec des tableau pour accumuler les informations(libelles, quantités et prix) 
    //ainsi qu'un verrou (booleen) pour vérouiller le panier et enregistré la commande dans l'historique.
    function CreationPanier(){
        $retour=true;
        if(isset($_SESSION['panier']))
        {
            $retour=false;
        }
        else{
           $_SESSION['panier']=array();
           $_SESSION['panier']['libelleProduit'] = array();
           $_SESSION['panier']['qteProduit'] = array();
           $_SESSION['panier']['prixProduit'] = array();
           $_SESSION['panier']['verrou'] = false;//on vérouille le panier quand on paye à la fin.
        }
        return $retour;
    }
    function AjouterArticle($libelleProduit,$qteProduit,$prixProduit){

        //Si le panier existe
        if (CreationPanier() && !IsVerrouille())
        {
            //Si le produit existe déjà on ajoute seulement la quantité
            $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
        
            if ($positionProduit !== false)
            {
                $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
            }
            else
            {
                //Sinon on ajoute le produit
                array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
                array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
                array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
            }
        }
        else
        {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }

    function SupprimerArticle($libelleProduit){
        //Si le panier existe
        if (CreationPanier() && !IsVerrouille())
        {
            //Nous allons passer par un panier temporaire
            $tmp=array();
            $tmp['libelleProduit'] = array();
            $tmp['qteProduit'] = array();
            $tmp['prixProduit'] = array();
            $tmp['verrou'] = $_SESSION['panier']['verrou'];
        
            for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
            {
                if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
                {
                    array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                    array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                    array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
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
    function ModifierQTeArticle($libelleProduit,$qteProduit){
        //Si le panier existe
        if (CreationPanier() && !IsVerrouille())
        {
           //Si la quantité est positive on modifie sinon on supprime l'article
           if ($qteProduit > 0)
           {
              //Recherche du produit dans le panier
              $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
     
              if ($positionProduit !== false)
              {
                 $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
              }
           }
           else
           SupprimerArticle($libelleProduit);
        }
        else
        {
            echo "Un problème est survenu veuillez contacter l'administrateur du site.";
        }
    }

    //calcul le montant final
    function MontantGlobal(){
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
        {
           $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
        }
        return $total;
    }    

    //vérouille le panier
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
            $nbArticles=count($_SESSION['panier']['libelleProduit']);
        }
        return $retour;
    }

    //supprime le panier
    function supprimePanier(){
        unset($_SESSION['panier']);
    } 
?>
<?php 
session_start();
//On récupère l'URL de la page pour ensuite affecter class="active" au lien de la nav
$page = $_SERVER['REQUEST_URI'];
$page = str_replace("/back/", "",$page);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php header("Content-Type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8"/>
        <title>MagaKa</title>
        <link rel="shortcut icon" href="..\Documents\Images\png-clipart-book-icon-opened-books-angle-text.png"/>
        <link rel="stylesheet" href="Style\style.css">
    </head>
    
    <body>
        <?php
            include("Vues/Include/navigation.inc.php");

            if(isset($_SESSION['idAd'])){
                if(!isset($_GET['page']))
                {
                    include("Vues/Include/index.inc.php");
                }
    
                else
                {
                    $page=$_GET["page"];
                    
                    if(file_exists("Controleur/$page.php"))
                    {    
                        include("Controleur/$page.php");
                    }
    
                    else
                    {
    
                        include("Vues/Include/error.inc.php");
                    }
                }
            }
            else{
                include("Controleur/connexion.php");
            }
            
        ?>
        <br><br>
        <script type="text/javascript" src="Js/Js.js"></script>
    </body>
</html>
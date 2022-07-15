<?php
    //On récupère l'URL de la page actuel
    $page = $_SERVER['REQUEST_URI'];
    //on remplace le / par rien pour que $page ne prenne pas le / en compte (on aura page au lieu de /page)
    $page = str_replace("/", "",$page);
?>

<!DOCTYPE html>
<html lang="fr">
        <head>
            <title>Choix front ou back?</title>
            <link rel="shortcut icon" href="Documents\Images\png-clipart-book-icon-opened-books-angle-text.png"/>
        </head>
        
        <body style="text-align:center;line-height:30em;"> 
            <a href="http://site/back"><input type='button' value='BACK'></a>
            <a href="http://site/front"><input type='button' value='FRONT'></a>          
        </body>
</html>


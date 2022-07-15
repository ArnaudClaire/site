<ul id="barre">     
    <li><a <?php if($page == "index.php"){echo 'class="active"';} ?> href="index.php">Accueil</a></li>  

    <li class='dropdown'>
        <a href="index.php?page=figurine">Gestion des Figurines</a>
        <div class="dropdown-content">
            <a href="?page=manip/figurineManip&manip=ajout">Ajouter une Figurine</a>  
        </div>  
    </li>

    <li class='dropdown'>
        <a href="index.php?page=categorie">Gestion des Cat&eacute;gories</a>
        <div class="dropdown-content">
            <a href="?page=manip/categorieManip&manip=ajout">Ajouter une Cat&eacute;gorie</a>  
        </div>  
    </li>

    <li class='dropdown'>
        <a href="index.php?page=commande">Historique des Commandes</a> 
    </li>

    <li class='dropdown'>
        <a href="index.php?page=compte">Gestion des Comptes</a>
        <div class="dropdown-content">
            <a href="?page=manip/compteManip&manip=ajout">Ajouter un Compte</a>  
        </div>  
    </li>
    
    <li class='dropdown'>
        <a href="index.php?page=administrateur">Gestion des Administrateurs</a>
        <div class="dropdown-content">
            <a href="?page=manip/adminManip&manip=ajout">Ajouter un Administrateur</a>  
        </div>  
    </li>
</ul>



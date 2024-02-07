<?php
require('header.php');
if (!isset($_SESSION['id'])) {
        exit("Veuillez vous authentifier");
    } elseif ($_SESSION['role'] !== 1) {
        exit("Accès refusé");
    } else { ?>
<div id="panneau_admin">

    <h2 id="admin_titre"> Panneau D'administration</h2>

    <div id="div_admin_user">

        <h4 class="gestion_titre">Gerer les utilisateur :</h4>


        <a class="gestion_lien" href="<?php echo _BASE ?>/admin_utilisateur/liste_utilisateurs">Liste utilisateur</a>
    </div>

    <div id="div_admin_news">
        
        <h4 class="gestion_titre"> Gerer les news :</h4>

        <a class="gestion_lien" href="<?php echo _BASE ?>/admin_news/gestion_news">Liste des news</a>

    </div>
    
    <div id="div_admin_news">
        
        <h4 class="gestion_titre"> Publier une news :</h4>

        <a class="gestion_lien" href="<?php echo _BASE ?>/admin_news/affiche_creation_news">Formulaire de publication</a>

    </div>
    
</div>

</body>

</html>
<?php } ?>
<?php 
require('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste-Utilisateurs-Indies</title>
</head>

<body>
    <div id="données_utilisateur">
    <h2 id="titre_2">Liste des utilisateurs</h2>

    <?php foreach ($rows_users as $row) { ?>
        <h3 class="info_utilisateur">Nom d'utilisateur : <span class="donnee_utilisateur"> <?= $row['nom'] ?> </span></h3>
        <p class="info_utilisateur">>Id utilisateur : <span class="donnee_utilisateur"> <?= $row['id_utilisateur'] ?> </span> </p>
        <p class="info_utilisateur">>Adresse Email : <span class="donnee_utilisateur"> <?= $row['email'] ?> </span> </p>
        <p class="info_utilisateur">>Id_role : <span class="donnee_utilisateur"> <?= $row['id_role'] ?> </span> </p>
        <!-- Lien de modification de l'utilisateur ciblé par son Id -->
        <a class="nav_modif" href="<?= _BASE ?>/admin_utilisateur/affiche_modifier_utilisateur/<?= $row['id_utilisateur'] ?>">Modifier cet utilisateur</a>
        <!-- Lien de suppression de l'utilisateur ciblé par son Id -->
        <a class="nav_supp" href="" data-id-user="<?= $row['id_utilisateur'] ?>">Supprimer cet utilisateur</a>
    <?php } ?>
    
    <script>var base_url = "<?php echo _BASE; ?>";</script>
    <script src="<?= _BASE ?>/../publique/script/gestion_utilisateur.js"></script>
    </div>
</body>

</html>

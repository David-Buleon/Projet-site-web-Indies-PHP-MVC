<?php require('header.php'); ?>

<?php

if (!isset($_SESSION['id'])) {
    exit("Veuillez vous authentifier");
} elseif ($_SESSION['role'] !== 1) {
    exit("Accès refusé");
} else {
?>

    <div id="news">
        <h2 id="admin_titre">modifier un article</h2><br>

        <form action="<?php echo _BASE; ?>/admin_news/modifier_news/" method="POST" enctype="multipart/form-data">
            <label for="titre" class="nom_modif">Titre :</label>
            <input type="text" name="titre" class="input_modif" placeholder="<?= $data['titre'] ?>"><br><br>

            <label for="image" class="nom_modif">Insérer une image :</label>
            <input type="file" name="image" class="input_modif" placeholder="<?= $data['image'] ?>"><br><br>
            
            <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id'] ?>">
            <input type="hidden" name="id_news" value="<?= $data['id_news'] ?>">
            
           
                <label for="article" class="nom_modif" id="text_area">Rédiger votre article :</label><br>
                <textarea id="texte_article" name="article" placeholder="<?= $data['article'] ?>"></textarea>
     
            

            <input type="submit" name="sub" value="Publier">
        </form>
    </div>
<?php
}
?>

</body>

</html>
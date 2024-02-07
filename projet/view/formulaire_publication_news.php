<?php
require('view/header.php');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation-article-Indies</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['id'])) {
        exit("Veuillez vous authentifier");
    } elseif ($_SESSION['role'] !== 1) {
        exit("Accès refusé");
    } else {
    ?><div id="news">
            <h2 id="admin_titre">Publier un article</h2><br>

            <form action="<?php echo _BASE; ?>/admin_news/publier_article/" method="POST" enctype="multipart/form-data">
                <label for="titre" class="nom_modif">Titre :</label>
                <input type="text" name="titre" id="news_titre" required><br><br>

                <label for="image" class="nom_modif">Insérer une image :</label>
                <input type="file" name="image" id="image"><br><br>

                <label for="article" class="nom_modif" id="text_area">Rédiger votre article :</label>
                <textarea id="texte_article" name="article"></textarea>

                <input type="hidden" name="id_utilisateur" value="<?= $_SESSION['id'] ?>">

                <input type="submit" name="sub" value="Publier">
            </form>
        </div>
    <?php } ?>

</body>

</html>
<?php require('view/header.php'); ?>




<?php foreach ($datas as $data) { ?>
    <div id="news">
    <h2 id="premier_titre"> Liste des news </h2>
        <h3 id="titre_news"><?= $data['titre'] ?></h3>
        <p id="article"><?= $data['article'] ?></p>
        <img id="image_news" src="/Dev/Indies/publique/img_article/<?= $data['image'] ?>" height="100" width="100">
        <p id="date"><?= $data['news_date'] ?>
            <a class="nav_modif" href="<?php echo _BASE; ?>/admin_news/affiche_modifier_news/<?= $data['id_news'] ?>"> Modifier cette news</a>

            <a class="nav_supp_news" href="" data-id-news="<?= $data['id_news'] ?>">Supprimer cette news</a>
        </p>
    </div>
<?php } ?>
<script>
    var base_url = "<?php echo _BASE; ?>";
</script>
<script src="/Dev/Indies/publique/script/gestion_news.js"></script>

</body>

</html>
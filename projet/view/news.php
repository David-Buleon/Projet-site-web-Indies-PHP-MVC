<?php
require('view/header.php');
?>
<div id="news">
        <h2 id="premier_titre">Découvrez les news chez Indies !</h2>

        <?php foreach ($datas as $data) { ?>

            <h3 id="titre_news"> <?= $data['titre'] ?> </h3>
            <div id="article"> <?= nl2br($data['article']) ?></div>
            <img id="image_news" src="/Dev/Indies/publique/img_article/<?= $data['image'] ?>" height="100" width="100">
            <p id="date"> <?= $data['news_date'] ?> </p>
<?php }
?>

 </div>

</body>

</html>
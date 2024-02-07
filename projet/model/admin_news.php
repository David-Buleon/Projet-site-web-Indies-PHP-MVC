<?php 
function publication_article($id, $titre, $article , $image ) {
    require('connect.php'); 

    if(isset($_POST['sub'])) {
        // Récupérer les données du formulaire
        $id_utilisateur = $id;
        $titre = $titre ;
        $article = $article ; 
        $image = $image; 
       
        try {
            $pdo->beginTransaction();
            // Exécuter la requête SQL pour insérer l'article avec le chemin d'accès de l'image
            $sql = $pdo->prepare("INSERT INTO news (id_utilisateur, titre, article, image) VALUES (?, ?, ?, ?)");
            $sql->execute([$id_utilisateur, $titre, $article, $image]);
            
            $pdo->commit();
            // L'article a été inséré avec succès dans la base de données
            // Votre code supplémentaire ici...
        } catch(PDOException $e) {
            // Une erreur s'est produite lors de l'insertion de l'article
            echo "Erreur lors de l'insertion de l'article : " . $e->getMessage();
            
            throw $e;
        }}
    }

    function update_news($id_utilisateur, $titre, $article, $image, $id_news) {
        require('connect.php');
    
        try {
            $pdo->beginTransaction();
    
            $sql = $pdo->prepare('UPDATE news SET titre = ?, image = ?, article = ?, id_utilisateur = ? WHERE id_news = ?');
            $sql->execute([$titre, $image, $article, $id_utilisateur, $id_news]);
            $pdo->commit();
    
            // L'article a été mis à jour avec succès dans la base de données
            // Votre code supplémentaire ici...
        } catch (PDOException $e) {
            // Une erreur s'est produite lors de la mise à jour de l'article
            $pdo->rollback();
            throw $e;
        }
    }
    
    function supp_news($id_news) {
        require('connect.php');
    
        try {
            $pdo->beginTransaction();
            $sql = $pdo->prepare('DELETE FROM news WHERE news.id_news = ?');
            $sql->execute([$id_news]);
            $pdo->commit();
            return true ; //Succès 
        } catch (PDOException $e) {
           return false; //echec 
        }
    }

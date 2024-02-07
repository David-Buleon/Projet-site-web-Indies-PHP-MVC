<?php
function select_news(){
    require('connect.php'); 
    try {
        $pdo->beginTransaction(); 

        $sql = $pdo->prepare('SELECT news.* FROM news'); 
        $sql->execute();  // Passer la valeur du paramètre $id_news à la méthode execute()

        $datas = $sql->fetchAll();  // Utiliser $sql au lieu de $pdo pour récupérer les données

        $pdo->commit();
        return $datas; 
         
    }catch(PDOException $e){
        $pdo->rollback(); 
        throw $e; 
    }
}

function select_news_id($id) {
    require('connect.php');
    try {
        $pdo->beginTransaction();

        $sql = $pdo->prepare('SELECT news.* FROM news WHERE id_news = ? ');
        $sql->execute([$id]);  // Passer la valeur du paramètre $id_news à la méthode execute()

        $data = $sql->fetch();  // Utiliser $sql au lieu de $pdo pour récupérer les données

        $pdo->commit();
        return $data;

    } catch(PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}
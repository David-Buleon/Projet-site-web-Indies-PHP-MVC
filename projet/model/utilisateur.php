<?php 

function select_one_user($id)
{
    require('connect.php');
    try {
        $pdo->beginTransaction();
        
        $sql = $pdo->prepare("SELECT utilisateur.* FROM utilisateur WHERE utilisateur.id_utilisateur = ?");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        
        $pdo->commit();
        
        return $row;
    } catch (PDOException $err) {
        $pdo->rollback(); 
        throw $err; 
    }
}


function update_user($data ,$id){
    require('connect.php'); 
    try {

        $pdo->beginTransaction(); 
        $sql = $pdo->prepare(' UPDATE utilisateur SET utilisateur.id_utilisateur  = ? ,  utilisateur.nom = ? , utilisateur.email = ? , utilisateur.password = ?  WHERE utilisateur.id_utilisateur = ? '); 
        $sql->execute([$data['id_utilisateur'] , $data['nom'], $data['email'], $data['password'] , $id]);
        $pdo->commit(); 



    }catch (PDOException $err) {
        print_r($err->getMessage());
    }

}

function  supprimer_utilisateur($id){
    require('connect.php'); 
    try {
        $pdo->beginTransaction(); 
        $sql = $pdo->prepare('DELETE FROM utilisateur WHERE utilisateur.id_utilisateur = ?'); 
        $sql->execute([$id]); 
        $pdo->commit(); 
    }catch (PDOException $err) {
        print_r($err->getMessage());
    }
             }
    

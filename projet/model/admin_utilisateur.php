<?php 
// requêtes qui recupère tout les utlisateur dans la base de données.
function select_all_users(){
    require('connect.php'); 
    try {
        $pdo->beginTransaction();
        
        $sql = $pdo->prepare('SELECT utilisateur.* FROM utilisateur'); 
        $sql->execute(); 
        $rows =  $sql->fetchAll(PDO::FETCH_ASSOC); 

        $pdo->commit(); 
        return $rows; 
    }catch (PDOException $e){
        $pdo->rollback(); 
        throw $e;
    }
    } 

// fonction de modification d'utilisateur 
function modifier_user($id_user, $data) {
    require('connect.php');
    
    try {
        $pdo->beginTransaction(); 
        
        // Vérifier si l'ID de rôle existe dans la table "role"
        $sql_check_role = $pdo->prepare('SELECT id_role FROM role WHERE id_role = ?');
        $sql_check_role->execute([$data['id_role']]);
        $role_exists = $sql_check_role->rowCount() > 0;

        if ($role_exists) {
            // Mettre à jour le rôle de l'utilisateur
            $sql = $pdo->prepare('UPDATE utilisateur SET nom = ?, email = ?, password = ?, id_role = ? WHERE id_utilisateur = ?');
            $sql->execute([$data['nom'], $data['email'], $data['password'], $data['id_role'], $id_user]);
            $pdo->commit();
        } else {
            // Le nouvel ID de rôle n'existe pas dans la table "role"
            echo "L'ID de rôle spécifié n'existe pas.";
        }
    } catch (PDOException $err) {
        print_r($err->getMessage());
    }
}

function supp_utilisateur($id) {
    require('connect.php'); 

    try {
        $pdo->beginTransaction(); 
        $sql = $pdo->prepare('DELETE FROM utilisateur WHERE utilisateur.id_utilisateur = ?'); 
        $sql->execute([$id]); 
        $pdo->commit(); 
        return true; // Succès 
    } catch (PDOException $e) {
        return false; // Échec
    }
}

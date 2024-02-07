<?php 

// Requête sql qui insert un nouvel utilisateur 
function inscrire($data)
{
    require('connect.php');

    try {
        $pdo->beginTransaction();

        $sql = $pdo->prepare('INSERT INTO utilisateur (nom, email, password, id_role) VALUES (?, ?, ?, ?)');
        $sql->execute([$data['nom'], $data['email'], $data['password'], $data['id_role']]);

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}



// Requêtes Sql qui selection  tout un utilisateur
function connexion($email, $pass)
{

    require('connect.php');
    try {
        $sql = $pdo->prepare("SELECT utilisateur.* FROM utilisateur WHERE utilisateur.email = ?");
        $sql->execute([$email]);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);


// Verification du mots de passe 
        if (is_array($rows)) {
            if (password_verify($pass, $rows[0]['password'])) {
                return $rows;
            } else {
                return "forbidden";
            }
        } 
    } catch (PDOException $err) {
        echo"err" ; 
    }
}





?>
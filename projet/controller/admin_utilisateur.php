<?php 
// fonction qui liste les utilisateur pour l'administration 
function liste_utilisateurs(){
    require('model/admin_utilisateur.php');
    $rows_users = select_all_users();
    require('view/gestion_utilisateurs.php'); 


}
function affiche_modifier_utilisateur() {
    require('model/utilisateur.php'); 
    // creation du variable $tableau_get pour diviser l'URL en segments en utilisant le délimiteur '/'
    $tableau_get = explode('/', $_GET['action']); 
    // utilisatien de end($tableau_get) pour récupérer le dernier élément du tableau $tableau_get, qui est l'id utilisateur
    $id = end($tableau_get);
    $row_user = select_one_user($id);
    require('view/formulaire_modifier_utilisateur.php'); 
} 

function modifier_utilisateur($id){
    require('model/admin_utilisateur.php');
    $tableau_get = explode('/', $_GET['action']); 
    $id_user = end($tableau_get); 

    $data = $_POST ; 
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    modifier_user($id_user , $data); 
}

function suppression_utilisateur($id) {
    require('model/admin_utilisateur.php'); 

    $data = supp_utilisateur($id);

    if ($data) {
        $response = [
            'success' => true,
            'message' => 'Utilisateur supprimé'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'La suppression de l\'utilisateur a échoué !'
        ];
    }

   
    echo json_encode($response);
    exit;
}


?>
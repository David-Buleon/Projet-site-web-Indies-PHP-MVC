<?php 
// fonction qui affiche le compte de l'utilisateur ciblé 
function gestion_compte(){
    session_start();
    require('model/utilisateur.php');
    $id = $_SESSION['id'];
    $row = select_one_user($id);
    require('view/compte_utilisateur.php');
}
// function qui affiche le formulaire de modification de l'utilisateur ciblé 
function affiche_modif_formulaire($id){
    session_start();
    require('model/utilisateur.php'); 
    $id = $_SESSION['id'];
    $select_user_id = select_one_user($id);
    require('view/formulaire_modifier_compte.php');

}
// function qui effectue la modification de l'utilisateur ciblé par l'utilisateur 
function modif_user($id){
    session_start();
    require('model/utilisateur.php');
    
    $id = $_SESSION['id'];
    $data = $_POST;
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    update_user($data , $id);
}

// function de suppression de compte par l'utilisateur 
function suppression_compte($id){
session_start(); 
require('model/utilisateur.php');
require('view/compte_utilisateur.php');
$id = $_SESSION['id']; 
$supp_user_id = supprimer_utilisateur($id); 
header('location: ' . _BASE . '/inscription_connexion/affiche_connexion');
session_reset();



}

    

?>
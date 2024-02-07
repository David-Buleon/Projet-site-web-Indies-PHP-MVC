<?php 


// Affiche le formulaire d'inscription
function affiche_inscription(){
    require('view/formulaire_inscription.php'); 
} 


//enregistre l'utilisateur avec le role 4 = visiteur
function inscription()
{
    require('model/inscription_connexion.php');

    $data = $_POST;
    $data = array_map('htmlspecialchars', $data); // Appliquer htmlspecialchars à toutes les valeurs du tableau

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    inscrire($data);

    header('location: ' . _BASE . '/accueil/affiche_accueil');
    session_start();
}
    


// affiche le formulaire de connexion 
function affiche_connexion(){
    session_start();
    require('view/formulaire_connexion.php'); 
  
    

}

function se_connecter(){
    session_start();

    require('model/inscription_connexion.php'); 
    $email = htmlspecialchars($_POST['email']); 
    $password = $_POST['password']; 
    $result = connexion($email, $password);

    if ($result === "forbidden") {
        // Mot de passe incorrect
        $_SESSION['erreur_connexion'] = "Le mot de passe est incorrect.";
        header('location: ' . _BASE . '/inscription_connexion/affiche_connexion');

    } else {
        // Connexion réussie
        $_SESSION['id'] = $result[0]['id_utilisateur'];
        $_SESSION['nom'] = $result[0]['nom']; 
        $_SESSION['email'] = $result[0]['email']; 
        $_SESSION['role'] = $result[0]['id_role']; 

        header('location: ' . _BASE . '/accueil/affiche_accueil');
       
    }
}



function se_deconnecter()
{
    session_start();
    session_unset();
    session_destroy();
   
    header('location: ' . _BASE . '/inscription_connexion/affiche_connexion');

}


?>
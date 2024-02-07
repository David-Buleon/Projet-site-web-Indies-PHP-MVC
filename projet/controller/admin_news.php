<?php 
function affiche_creation_news(){
    require('view/formulaire_publication_news.php');

}


function publier_article($id) {
   require('model/admin_news.php');
// Vérifier si le formulaire a été soumis (le bouton "sub" est présent dans le formulaire)
    if (isset($_POST['sub'])) {
        // Récupérer les données du formulaire appliquer htmlspecialchars pour éviter les attaques XSS

        // Récupérer l'ID de l'utilisateur (éventuellement déjà fourni en paramètre de la fonction, mais ici on va le remplacer par celui du formulaire)
        $id = htmlspecialchars($_POST['id_utilisateur']);

        // Récupérer le titre de l'article
        $titre = htmlspecialchars($_POST['titre']);

        // Récupérer le contenu de l'article
        $article = htmlspecialchars($_POST['article']);

        $image = null;
         // Vérifier si une image a été téléchargée
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Dossier de destination où l'image sera sauvegardée
            $dossier = '../publique/img_article/';

            // Nom temporaire de l'image après son téléchargement
            $temp_name = $_FILES['image']['tmp_name'];

            // Vérifier que l'image a été téléchargée avec succès
            if (!is_uploaded_file($temp_name)) {
                exit('Erreur, l\'image est introuvable');
            }

            // Vérifier la taille de l'image pour éviter des fichiers trop volumineux
            if ($_FILES['image']['size'] >= 1000000) {
                exit('Erreur, l\'image est trop volumineuse');
            }

            // Obtenir l'extension de l'image téléchargée
            $infoimage = pathinfo($_FILES['image']['name']);
            $extensions_upload = $infoimage['extension'];

            // Convertir l'extension en minuscules pour la cohérence
            $extensions_upload = strtolower($extensions_upload);

            // Liste des extensions autorisées pour les images
            $extensions_autoriser = array('png', 'jpg', 'jpeg');

            // Vérifier si l'extension de l'image est autorisée
            if (!in_array($extensions_upload, $extensions_autoriser)) {
                exit('Erreur, veuillez insérer une image au bon format. Formats autorisés : png, jpg, jpeg');
            }

            // Construire le nom de l'image à partir de l'ID de l'utilisateur, du titre de l'article et de son extension
            $nom_image = $id . "_" . str_replace(' ', '_', $titre) . "." . $extensions_upload;

            // Déplacer l'image téléchargée vers le dossier de destination avec le nouveau nom
            if (!move_uploaded_file($temp_name, $dossier . $nom_image)) {
                exit('Problème dans le téléchargement de l\'image, veuillez réessayer');
            }

            // Attribuer le nom de l'image à la variable $image pour l'utiliser ultérieurement dans la fonction
            $image = $nom_image;
        } else {
            // Si aucune image n'a été téléchargée, utiliser une image par défaut
            $image = 'indies_logo.png';
        }

        // Appeler la fonction pour publier l'article avec les données récupérées
        publication_article($id, $titre, $article, $image);

        // Afficher les données du formulaire (peut être utile pour déboguer)
        dbg($_POST);
    }
}




function gestion_news(){
    require('model/news.php');
    $datas = select_news(); 
    require('view/gestion_news.php'); 

}



function affiche_modifier_news($id) {
    $tableau_get = explode('/', $_GET['action']);
    $id = end($tableau_get);

    require('model/news.php');
    $data = select_news_id($id);

    // Passer les données à la vue
  

    require('view/formulaire_modifier_news.php');
}

function modifier_news() {
    require('model/admin_news.php');

    if (isset($_POST['sub'])) {
        $id_utilisateur = $_POST['id_utilisateur'];
        $titre = $_POST['titre'];
        $article = $_POST['article'];
        $image = null;
        $id_news = $_POST['id_news'];

        if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
            $dossier = '../publique/img_article/';
            $temp_name = $_FILES['image']['tmp_name'];

            if (!is_uploaded_file($temp_name)) {
                exit('Erreur, l\'image est introuvable');
            }

            if ($_FILES['image']['size'] >= 1000000) {
                exit('Erreur, l\'image est trop volumineuse');
            }

            $infoimage = pathinfo($_FILES['image']['name']);
            $extensions_upload = $infoimage['extension'];

            $extensions_upload = strtolower($extensions_upload);
            $extensions_autoriser = array('png', 'jpg', 'jpeg');

            if (!in_array($extensions_upload, $extensions_autoriser)) {
                exit('Erreur, veuillez insérer une image au bon format. Formats autorisés : png, jpg, jpeg');
            }

            $nom_image = $id_utilisateur . "_" . str_replace(' ', '_', $titre) . "." . $extensions_upload;
            if (!move_uploaded_file($temp_name, $dossier . $nom_image)) {
                exit('Problème dans le téléchargement de l\'image, veuillez réessayer');
            }

            $image = $nom_image;
        } else {
            $image = 'indies_logo.png';
        }

        update_news($id_utilisateur, $titre, $article, $image, $id_news);
        dbg($_POST);
    }
}

function suppression_news($id_news) {
    require('model/admin_news.php');

    $data_news = supp_news($id_news);

    if ($data_news) {
        $response = [
            'success' => true,
            'message' => 'News supprimée'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'La suppression de cette news a échoué !'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}



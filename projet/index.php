<?php

// Définition de la constante _BASE avec le chemin de base du projet
define("_BASE", "/Dev/Indies/projet");

// Fonction pour afficher le contenu d'une variable de manière formatée
function dbg($d) {
    echo "<pre>"; 
    print_r($d);
    echo "</pre>"; 
}

// Vérification de l'action spécifiée dans l'URL (GET)
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Vérification si une action est définie
if ($action != null) {
    // Séparation de l'action en morceaux en utilisant le délimiteur "/"
    $tab = explode('/', $action);
    
    // Le premier élément de $tab représente le nom du contrôleur à inclure
    $controller = $tab[0];
    
    // Le deuxième élément, s'il existe, représente la fonction à appeler dans le contrôleur
    $commande = isset($tab[1]) ? $tab[1] : 'index'; // Si aucune fonction spécifiée, utilise 'index'

    // Inclusion du fichier du contrôleur
    require('controller/'.$controller.'.php');

    // Vérification si la fonction spécifiée dans $commande existe dans le contrôleur inclus
    if (function_exists($commande)) {
        // Si un argument est spécifié dans l'URL, on le récupère, sinon on le met à NULL
        $arg = isset($tab[2]) ? $tab[2] : NULL;

        // Appel de la fonction avec ou sans argument
        if (isset($arg)) {
            $commande($arg);
        } else { 
            $commande();
        }
    } else {
        // La fonction spécifiée n'existe pas dans le contrôleur
        echo '404 - Page not found';
    }
} else {
    // Aucune action spécifiée dans l'URL
    echo '404 - Page not found';
}
?>


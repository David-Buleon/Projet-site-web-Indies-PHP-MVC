<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Les Indies </title>
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/header.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/accueil.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/news.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/admin.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/publication_news.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/modification_news.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/utilisateur.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/modif_utilisateur.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/liste_utilisateur.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/connexion.css">
    <link rel="stylesheet" href="<?php echo _BASE; ?>/view/styles/inscription.css">

</head>

<body>
    <header>
        <?php if (session_status() !== PHP_SESSION_ACTIVE) session_start();

        if (!empty($_SESSION['id'])) { ?>
            <div id="deco_gestion">
                <!-- Lien de Deconnexion -->
                <div id="nav_deconnexion">
                    <a href="<?php echo _BASE; ?>/inscription_connexion/se_deconnecter">Déconnexion</a>
                </div>
                <!-- Lien de gestion du compte de l'utilisateur connecté -->
                <div id="nav_gestion_du_compte">
                    <a href="<?php echo _BASE; ?>/utilisateur/gestion_compte/<?php echo $_SESSION['id'] ?>">Gérer mon compte utilisateur</a>
                </div>
            </div>
            <?php
            if ($_SESSION['role'] == 1) {
            ?>
                <!-- Lien d'administration -->
                <div id="nav_admin">
                    <a href="<?php echo _BASE; ?>/admin/affiche_administration">Administration</a>
                </div>
        <?php
            }
        }
        ?>
        <?php
        if (empty($_SESSION['email'])) { ?>

            <div id="connexion_inscription">
                <!-- Lien de connexion -->
                <a id="nav_connexion" class="lien_haut" href="<?php echo _BASE; ?>/inscription_connexion/affiche_connexion">Connexion</a>
                <!-- Lien d'inscription -->
                <a id="nav_inscription" class="lien_haut" href="<?php echo _BASE; ?>/inscription_connexion/affiche_inscription">Inscription</a>
            </div>

        <?php } ?>
        <div id="banniere">

            <h1 id="titre_1">Les Indies</h1>

            <img id="img_1" src="<?php echo _BASE; ?>/view/img/indies_logo.png" alt="logo de la communauter Indies">
        
        </div>
        <div id="accueil_news">
            <!-- Lien navigation accueil -->
            <a id="nav_accueil" class="lien_bas" href="<?php echo _BASE; ?>/accueil/affiche_accueil"> Accueil</a>
            <!-- Lien navigation news -->
            <a id="nav_news" class="lien_bas" href="<?php echo _BASE; ?>/news/affiche_news">News</a>
            <!-- Lien navigation gallery -->
        </div>
    </header>
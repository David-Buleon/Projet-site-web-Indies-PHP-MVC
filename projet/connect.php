<?php
// Définit le nom de la base de données
$dbname ="indies"; 
// Définit l'hôte de la base de données
$dbhost = "127.0.0.1"; 
// Définit le nom d'utilisateur de la base de données
$dbuser="root";
// Définit le mot de passe de la base de données
$password=""; 
// Crée une nouvelle instance de PDO pour se connecter à la base de données
$pdo = new PDO("mysql:host=".$dbhost.";dbname=".$dbname.";charset=UTF8", $dbuser , $password) ;
// Configure le mode d'erreur de PDO pour générer des exceptions en cas d'erreur
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>
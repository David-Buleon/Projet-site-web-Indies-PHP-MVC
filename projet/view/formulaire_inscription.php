<?php require('header.php'); ?>

<!-- Formulaire d'inscription -->
<div class="formulaire_inscription" id="formulaire_connexion">
    
    <img id="img_connexion_inscription" src="<?php echo _BASE; ?>/view/img/indies_logo.png" alt="logo de la communauté Indies">
    
    <form action="<?php echo _BASE; ?>/inscription_connexion/inscription" method="POST">
        
        <label for="nom">Nom utilisateur:</label>
        <input type="text" name="nom" id="input_identifiant" required>

        <label for="email">Adresse de messagerie:</label>
        <input type="email" name="email" id="input_email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="input_password" required>

        <input type="hidden" name="id_role" id="input_role" value="4">

        <button type="submit" id="submit_button">S'inscrire</button>
    </form>
</div>
</body>
</html>
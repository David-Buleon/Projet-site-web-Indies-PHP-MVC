<?php  require('header.php') ; 





?>

    <!-- Lien d'inscription-->
 

    <!-- Formualire de connexion -->
    <div id="formulaire_connexion"> 
    <img id="img_connexion_inscription" src="<?php echo _BASE; ?>/view/img/indies_logo.png" alt="logo de la communauter Indies">
        <form action="<?php echo _BASE; ?>/inscription_connexion/se_connecter" method="POST">

            <label for="email">Adresse de messagerie : </label>
            <input type="email" name="email" id="input_email">

            <label for="password">mots de passe :</label>
            <input type="password" name="password" id="input_password">



            <button type="submit" id="submit_button">Se connecter</button>

        </form>
    </div>

</body>

</html>
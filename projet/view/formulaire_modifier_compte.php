<?php
require('header.php');


?>


<div id="formulaire_inscription">

    <form action="<?php echo _BASE; ?>/utilisateur/modif_user/<?= $_SESSION['id'] ?>" method="POST">
        <input type="hidden" name="id_utilisateur" id="input_id_utilisateur" value="<?= $_SESSION['id'] ?>">
        <input type="hidden" name="id_role" id="input_id_role" value="<?= $_SESSION['role'] ?>">

        <label for="nom" id="nom_compte"> Nom utilisateur : </label>
        <input type="text" name="nom" id="input_identifiant" placeholder="<?= $select_user_id['nom'] ?>" required>

        <label for="email" id="adresse_compte">Adresse de messagerie : </label>
        <input type="email" name="email" id="input_email" placeholder="<?= $select_user_id['email'] ?>" required>

        <!-- le password saisie est crypter avec password_hash() -->
        <label id="password_compte" for="password">password</label>
        <input type="password" name="password" id="input_password" required>



        <!-- envoie des données -->
        <button type="submit">modifier</button>
    </form>
</div>

</body>

</html>
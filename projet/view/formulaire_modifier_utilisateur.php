<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification-Utilisateur-Indies</title>
</head>
<body>
<div class="formulaire_inscription">
        
        <form action="<?php echo _BASE; ?>/admin_utilisateur/modifier_utilisateur/<?=$row_user['id_utilisateur']?>" method="POST">
            
        <input type="hidden" name="id_utilisateur" id="input_id_utilisateur" value="<?=$row_user['id_utilisateur']?>"> 
            
            <label for="id_role">Id_role : </label>
            <input type="number" name="id_role" id="input_id_role" placeholder="<?=$row_user['id_role']?>"  min="1" max="4" >
   
            <label for="nom"> Nom utilisateur : </label>
            <input type="text" name="nom" id="input_identifiant" placeholder="<?=$row_user['nom']?>" required>
        
            <label for="email">Adresse de messagerie : </label>
            <input type="email" name="email" id="input_email" placeholder="<?=$row_user['email']?>" required>
        
            <!-- le password saisie est crypter avec password_hash() -->
            <label for="password">password</label>
            <input type="password" name="password" id="input_password" required>

           
        
            <!-- envoie des données -->
            <button type="submit">modifier</button>
        </form>
    </div>
    
</body>
</html>
<?php
require('header.php');

?>
    <div class="description_utilisateur"> 
        
        <h2 id="nom_compte"> Nom de compte : <span class="bleu"><?= $row['nom'] ?> </span></h2>
        <h3 id="adresse_compte">  Adresse E-Mail : <span class="bleu"> <?= $row['email'] ?> </span> </h3>
            <a class="gestion_utilisateur" href="<?php echo _BASE; ?>/utilisateur/affiche_modif_formulaire/<?= $_SESSION['id'] ?>">Modifier mon compte</a>
            <a class="gestion_utilisateur" href="" id="supprimerCompte">Supprimer mon compte</a>
        </p>
    </div>

    <script>
        document.getElementById('supprimerCompte').addEventListener('click', function(noDefault) {
            noDefault.preventDefault();

            var confirmation = confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');

            if (confirmation) {
                window.location.href = "<?php echo _BASE; ?>/utilisateur/suppression_compte/<?= $_SESSION['id'] ?>";
            } else {
                console.log('non');
            }
        });
    </script>

</body>

</html>
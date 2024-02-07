var deleteLinks = document.getElementsByClassName("nav_supp_user");

Array.from(deleteLinks).forEach(function(link) {
  link.addEventListener("click", function(event) {
    event.preventDefault();

    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
    if (confirmation) {
      var userId = this.getAttribute("data-id-user");
      var data = base_url + "/admin_utilisateur/suppression_utilisateur/" + userId;

      var xhr = new XMLHttpRequest();
      xhr.open("GET", data, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              // Suppression réussie, effectuez ici les actions appropriées
              alert(response.message);
              // Par exemple, actualisez la liste des utilisateurs
              window.location.reload();
            } else {
              // La suppression a échoué, affichez un message d'erreur ou effectuez les actions appropriées
              alert(response.message);
            }
          } else {
            // Une erreur s'est produite lors de la requête, affichez un message d'erreur ou effectuez les actions appropriées
            alert("Erreur lors de la suppression de l'utilisateur.");
          }
        }
      };
      xhr.send();
    } else {
      console.log("non");
    }
  });
});
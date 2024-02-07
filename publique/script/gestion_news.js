var deleteLinks = document.getElementsByClassName("nav_supp_news");

Array.from(deleteLinks).forEach(function(link) {
  link.addEventListener("click", function(event) {
    event.preventDefault();

    var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette news ?");
    if (confirmation) {
      var newsid = this.getAttribute("data-id-news");
      var data_news = base_url +"/admin_news/suppression_news/" + newsid;


      var xhr = new XMLHttpRequest();
      xhr.open("GET", data_news, true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
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
        }
      };
      xhr.send();
    } else {
      console.log("non");
    }
  });
});
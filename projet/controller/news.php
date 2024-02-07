<?php 



function  affiche_news(){
    require('model/news.php'); 
    
    $datas = select_news(); 
    require('view/news.php'); 
}


?>
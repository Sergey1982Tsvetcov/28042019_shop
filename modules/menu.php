<?php 
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php");

$people =  "SELECT * FROM `categories` 
            WHERE `parent_category` = 0";

$cats_people = mysqli_query($db, $people); 
$template = [];

while ( $row_people = mysqli_fetch_assoc($cats_people) ) {
    $template['cats_people'][] = $row_people; 


}




?>


<div class="wrapper">
    <div class="header">
        <div class="nav-main">
            <a href="#" class="logo"></a>
        
            <div class="nav">
            
            <?php 
                        
            foreach ($template['cats_people'] as $key => $value):?> 
                <a href="/pages/catalog.php?id=<?=$value['id']?>"><?=$value['name']?> </a> 
            <?php endforeach;?> 
            
             <!-- <a href="/pages/catalog.php?cat">Женщинам</a> 
              <a href="#">Мужчинам</a>
              <a href="#">Детям</a> -->

          
                <a href="#">Новинки</a>
                <a href="#">О нас</a>
            </div>  
        </div>
        <div class="hello-person">
            <div class="hello-person-pic"></div>
            <p>Привет,</p>
            <a href="#">(выйти)</a>
        </div>
        <div class="basket">
            <div class="basket-pic"></div>
            <a href="#">Корзина</a>
        </div>    
    </div>   
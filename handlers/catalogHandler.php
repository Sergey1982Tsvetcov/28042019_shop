<?php 
    //echo 'Привет';
    include ($_SERVER['DOCUMENT_ROOT'] .'/php/connect.php');
    
    $cat = $_GET['id'];
    sleep(2);
    //ищем дочернии на основании родительской 
    $query = "SELECT * FROM `categories` WHERE `parent_category` = $cat";
    $result = mysqli_query($db,$query);
    //explode(); превращает строчку в массив
    //implode(); превращает в строчку
    if(mysqli_num_rows($result)!=0){

    $allCategoriesID = [];
    while($row = mysqli_fetch_assoc($result)){
       // .1 индификаторы каждой строчки помещаем в массив
       array_push($allCategoriesID,$row['id']);
       // .2превращаем массив  в строку
    }
    $catsLine = implode(',',$allCategoriesID);
    //ищем товары ,соответствующие категориям 
    $query = "SELECT * FROM `catalog` WHERE `category_id` IN ($catsLine)";
    
    $goods = mysqli_query($db, $query);  

    //echo mysqli_num_rows($goods);

    $goods_array = [];

    while ( $row = mysqli_fetch_assoc($goods) ) {
       array_push( $goods_array, $row);
    }
    
    //JSON 

    //print_r( $goods_array );


    echo json_encode($goods_array);
} else {
    //ищем товары ,соответствующие категориям 
    $query = "SELECT * FROM `catalog` WHERE `category_id`= $cat";
        
    $goods = mysqli_query($db, $query);  

    //echo mysqli_num_rows($goods);

    $goods_array = [];

    while ( $row = mysqli_fetch_assoc($goods) ) {
    array_push( $goods_array, $row);
    }

    //JSON 

    //print_r( $goods_array );

    echo json_encode($goods_array);

}






    //echo '<pre>';
    //print_r($goods_array);
    //echo '</pre>';






?>


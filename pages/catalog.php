<?php
    include ($_SERVER['DOCUMENT_ROOT'] . "/modules/head.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/modules/menu.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php");
    //$id = '';
    //if (isset($_GET['id'])){
       // $id =$_GET['id'];
    //} else{
       // $id =1;
   // }
    //тернальный оператор
    // $id = (условие) ? правильный ответ : неправильный ответ;
    $id = (isset($_GET['id']))? $_GET['id']  :  1  ;

    $query = "SELECT * FROM `categories` 
                    WHERE `parent_category` = {$_GET['id']}";
    
    $cats = mysqli_query($db, $query);  
    $template = [
        // 'cats' => [
        //     0 => [
        //         'id' => '4',
        //         'name' => "Куртки",
        //         `parent_category` => '1'
        //     ],
        //     1 => [
        //         'id' => '4',
        //         'name' => "Куртки",
        //         `parent_category` => '1'
        //     ]
       // ]
      
    ];


    //echo mysqli_num_rows($goods);

    $goods_array = [];

    while ( $row = mysqli_fetch_assoc($cats) ) {
        $template ['cats'][] = $row;
      // array_push(  $template ['cats'] , $row);
    }

    // echo '<pre>';
    // print_r( $template);
    // echo '</pre>';


//$people =  "SELECT * FROM `categories` 
  //          WHERE `parent_category` = 0";

//$cats_people = mysqli_query($db, $people); 
//$template = [];

//while ( $row_people = mysqli_fetch_assoc($cats_people) ) {
 //   $template['cats_people'][] = $row_people; 


//}



$qr_people = "SELECT * FROM `categories` 
          WHERE `id` = {$_GET['id']}";

$result_people = mysqli_query($db, $qr_people); 
$row_parent = mysqli_fetch_assoc($result_people); 


?>
    




    <div class="breadcrumbs">
        <a href="#">Главная </a>
        <a href="#"><?=$row_parent['name']?></a>
    </div>    
    <div class="category-text">
        <h1><?=$row_parent['name']?></h1>
        <p>Все товары</p>
    </div>
    
    <div class="select">
        <select id="category">
            <option hidden>Категория</option>
            <?php foreach ($template ['cats'] as $key => $value ):?> 
            <option value="<?=$value['id']?>"><?=$value['name']?></option>
            <?php endforeach;?> 
            
        </select> 

        <select id="category-size">
            <option hidden>Размер</option>
            <option value="34-36">34-36</option>
            <option value="38-40">38-40</option>
            <option value="42-44">42-44</option>
            <option value="46-48">46-48</option>
            <option value="50-52">50-52</option>
        
        </select>

        <select id="category-price">
            <option hidden>Стоимость</option>
            <option value="3500">3500</option>
            <option value="5500">5500</option>
            <option value="7500">7500</option>
            <option value="9500">9500</option>
        
        </select>
    </div>

    <div class="goods">
    
    </div>

    <div class="pages">
        <div class="page">1</div>    
        <div class="page">2</div> 
        <div class="page">3</div> 
        <div class="page">4</div> 
    </div>    


<?php
    include ($_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php');
?>
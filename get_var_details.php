<?php
include('config.php');

$color_id = $_REQUEST['color_id'];
$rom_size = $_REQUEST['rom_size'];
$product_id = $_REQUEST['product_id'];
$conditionId = '';
if(isset($_REQUEST['conditionId'])){
   $conditionId  = $_REQUEST['conditionId'];

   $sql = "SELECT * FROM product_variation WHERE color_id = ".$color_id ." AND rom = '".$rom_size."' AND condi = '". $conditionId."' AND prod_id =". $product_id;
}else{
    $sql = "SELECT * FROM product_variation WHERE color_id = ".$color_id ." AND rom = '".$rom_size."' AND prod_id =". $product_id;
}
  
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'price' => $row['price'],
        'image_url' => $row['image_url'],
    );
} else {
     $response = array(
        'price' => 'Out of Stock');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
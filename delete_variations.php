<?php
include('config.php');

$colorId = $_REQUEST['colorId'];
$storageId = $_REQUEST['storageId'];
$price = $_REQUEST['price'];
$prod_id = $_REQUEST['prod_id'];
if($storageId != ''){
$sql = "delete FROM product_variation WHERE prod_id = $prod_id AND color_id = $colorId AND rom = '$storageId' AND price = $price LIMIT 1";
}else{
    $sql = "delete FROM product_variation WHERE prod_id = $prod_id AND color_id = $colorId  AND price = $price LIMIT 1" ;
}

//$sql = "delete * from product_variation where color_id=".$colorId;


$result = $db->query($sql);

if ($db->query($sql) === TRUE) {
    $response = array('status' => 'success', 'message' => 'Variation deleted successfully.');
} else {
    $response = array('status' => 'error', 'message' => 'Error deleting variation: '.$db->error);
}

header('Content-Type: application/json'); // Set header to indicate JSON response
echo json_encode($response); // return the JSON response
?>





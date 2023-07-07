<?php
include('config.php');

$modal = $_REQUEST['param'];

$sql = "select * from soum_colors where soum_colors.model_id=".$modal;
$result = $db->query($sql);
$num_rows = mysqli_num_rows($result);

$colors = array();
while($row = $result->fetch_assoc()){
    $color = array(
        "id" => $row["id"],
        "name" => $row["title"]
    );
    array_push($colors, $color);
}

$response = array(
    "num_rows" => $num_rows,
    "colors" => $colors
);

header('Content-Type: application/json'); // Set header to indicate JSON response
echo json_encode($response); // return the JSON response
?>





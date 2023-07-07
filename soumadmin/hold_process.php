<?php 
include('../config2.php');   

ini_set('display_errors',1);
error_reporting(E_ALL);

$stockholdername = $_REQUEST['stockholdername'];
$stockholderdate = $_REQUEST['stockholderdate']; 
$stockholderimei = $_REQUEST['stockholderimei'];

// Check if a record with the given IMEI number already exists
$sql = "SELECT id FROM soum_stock_holder_data WHERE imi_no = '$stockholderimei'";
$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
  // Update the existing record
  $row = $result->fetch_assoc();
  $id = $row['id'];
  $sql = "UPDATE soum_stock_holder_data SET name = '$stockholdername', date = '$stockholderdate' WHERE id = $id";
  $res = $db->query($sql);
  if ($res && mysqli_affected_rows($db) > 0) {

     $response = array('success' => true, 'name' => $stockholdername, 'date' => $stockholderdate);
    ?>
   
    <?php
  } else {
    // Failed to update the record
    echo "Error: " . $db->error;
  }
} else {
  // Insert a new record
  $sql = "INSERT INTO soum_stock_holder_data (name, date, imi_no) VALUES ('$stockholdername', '$stockholderdate', '$stockholderimei')";
  $res = $db->query($sql);
  $id = mysqli_insert_id($db);
  if ($res && $id) {

    $response = array('success' => true, 'name' => $stockholdername, 'date' => $stockholderdate);
    ?>
    
    <?php
  } else {
    // Failed to insert the new record
    echo "Error: " . $db->error;
  }
}
echo json_encode($response);

?>
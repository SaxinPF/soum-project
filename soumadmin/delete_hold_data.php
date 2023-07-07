<?php
include('../config2.php');   

ini_set('display_errors',1);
error_reporting(E_ALL);

$imei = $_REQUEST['imei'];

// Check if a record with the given IMEI number already exists
$sql = "SELECT id FROM soum_stock_holder_data WHERE imi_no = '$imei'";
$result = $db->query($sql);

// If a record with the given IMEI number exists, delete it
if ($result->num_rows > 0) {
    $sql = "DELETE FROM soum_stock_holder_data WHERE imi_no = '$imei'";
    if ($db->query($sql) === TRUE) {
        echo "Record deleted successfully";

        
    } else {
        echo "Error deleting record: " . $db->error;
    }
} else {
    echo "No record found with IMEI number $imei";
}

// Close the database connection
$db->close();
?>

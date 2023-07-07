<?php

include("config.php");
// Get input file name and file content
$all_headers = apache_request_headers();
$file_name = $all_headers['File-Name'];
$file_content = file_get_contents('php://input');

$id=$_REQUEST['pid'];
$type=$_REQUEST['type'];


info_log($file_name);


/*if($file_name!='')
{
    
    $enq_id=$id;
    $pos=strpos($file_name,".");
    
   if($type==1)
   {
    $newName="prodImage1".'-'.$enq_id.substr($file_name, $pos,strlen($file_name)-$pos);    
    $sql1="update soum_product_master set images='$newName' where prod_id='$id'";
    $db->query($sql1);
   }
   else
   {
     $newName="prodImage2".'-'.$enq_id.substr($file_name, $pos,strlen($file_name)-$pos);    
     $sql1="update soum_product_master set images1='$newName' where prod_id='$id'";
     $db->query($sql1);

   } 
}*/

write_file_to_server($file_name,$file_content,$id,$type);

/**
 * Returns name by which the file is going to be stored on server.
 */
function prepare_file_name($file_name,$id,$type) {
    $enq_id=$id;
    $pos=strpos($file_name,".");
    //return "prodImage".$type."".'-'.$enq_id.substr($file_name, $pos,strlen($file_name)-$pos);
    return $file_name;
}

/*
 * Writes uploaded file to uploads/ directory on server.
 */
function write_file_to_server($file_name, $file_content,$id,$type) {
    $server_file_name = prepare_file_name($file_name,$id,$type);
    $server_file_path = '../upload/temp/' . $server_file_name;
    file_put_contents($server_file_path,$file_content,$id);
}

/*
 * Writes info log on server. Useful while debugging.
 */
function info_log($message) {
    $file = 'log.txt';
    $current = file_get_contents($file);
    $current .= $message."\n";
    file_put_contents($file, $current);
}
?>
<?php
include('config.php'); 

if( !function_exists('apache_request_headers') ) {
    function apache_request_headers() {
        $arh = array();
        $rx_http = '/\AHTTP_/';

        foreach($_SERVER as $key => $val) {
            if( preg_match($rx_http, $key) ) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
           // do some nasty string manipulations to restore the original letter case
           // this should work in most cases
                $rx_matches = explode('_', $arh_key);

                if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) {
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    }

                    $arh_key = implode('-', $rx_matches);
                }

                $arh[$arh_key] = $val;
            }
        }

        return( $arh );
    }
}
$all_headers = apache_request_headers();
$file_name = $all_headers['File-Name'];
$sid=$_REQUEST['sid'];
$file_content = file_get_contents('php://input');

if($sid!='')
{
    $enq_id=$sid;
    $pos=strpos($file_name,".");
    $newName="Service".'-'.$enq_id.substr($file_name, $pos,strlen($file_name)-$pos);
    $sql="update advice_service set photograph='$newName' where Advisory_id=$enq_id";
    $res=$db->query($sql);

}



write_file_to_server($file_name,$file_content,$sid);



/**
 * Returns name by which the file is going to be stored on server.
 */
function prepare_file_name($file_name,$sid) {
    $enq_id=$sid;
    $pos=strpos($file_name,".");
    $newName="Service".'-'.$enq_id.substr($file_name, $pos,strlen($file_name)-$pos);     
    return $newName;
}



function query($newName,$enq_id)
{
    

}
/*
 * Writes uploaded file to uploads/ directory on server.
 */
function write_file_to_server($file_name, $file_content,$sid) {
    $server_file_name = prepare_file_name($file_name,$sid);
    $server_file_path = '../img/advice/' . $server_file_name;
    file_put_contents($server_file_path, $file_content);
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
<?php
if (in_array ($this_host, $local_IP))
{
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'lara_soum');
}
else
{
define('HOST', 'localhost');
    define('USER', 'lara_soum');
    define('PASS', 'Soum@123!@#');
    define('DBNAME', 'lara_soum');
}
define('SITEPATH', 'http://www.soum.co.in/');
define('UPLOAD_DIR', 'upload/');
define('AdminMob', '9829300040');

function sms_api($mobile,$message,$temp_id = 1407163016183339614){
 $url="https://sms.smsmenow.in/sendsms.jsp?user=mysoum&password=822c1608ebXX&mobiles=".$mobile."&sms=".$message."&senderid=MYSOUM&tempid=".$temp_id;
 $ret = file($url);
 return  $ret;
}

function slugify($text){
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function humanize($lowerCaseAndUnderscoredWord) {

            $result = explode(' ', str_replace('-', ' ', $lowerCaseAndUnderscoredWord));
            foreach ($result as &$word) {
                $word = mb_strtoupper(mb_substr($word, 0, 1)) . mb_substr($word, 1);
            }
        	$result = implode(' ', $result);

		   $result =  strtoupper($result);


		return $result;
}

define("CategoryType", serialize(array('phone'=>'Phones','cable'=>'Datacables','tablet'=>'Tablets','earphones'=>'Earphones','headphone'=>'Headphones','airpod'=>'Airpods','watches'=>'Watches','charger'=>'Charger','aux'=>'Laptops','speakers'=>'Speakers','power_bank'=>'Power Bank')));
function get_category_types(){
  return unserialize(CategoryType);
}


define("Payment_Arr", serialize(array('mobile_wallet'=>'Mobile Wallet','cash'=>'Cash','netbanking'=>'NetBanking','bank_cards'=>'Bank Cards')));
function get_payment_modes(){
  return unserialize(Payment_Arr);
}


?>

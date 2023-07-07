﻿<?php
    include('../config2.php');    ?>
<style>

table, tr, td, div, p {
font-size:11px;
    /*border:1px solid black;*/
}

h1, h2, h3, h4, h5, h6{
    padding:0;
    margin:0;
}

table, div {
    font-family: dejavusanscondensed, Arial, sans-serif;
}

table {
    width: 96%;
    line-height: normal;
    color: #000;
    font-size: 12px;
    margin-left: 10px; /* Invoice margin */
    margin-right: 0px; /* Invoice margin */
}

table td, table th {
    padding-left:2px;
    vertical-align:top;
    line-height: inherit;
}

table tr.top td {
   padding-top: 2px;
}

/* Invoice information */
table tr.top td:nth-child(2){
    text-align:right;
}

div.title div {
    padding: 5px;
    width: 40%;
    float: left;
    margin-left: 60px; /* Invoice margin */
    line-height: 55px;
}

div.title div.watermark {
    float: right;
    margin-right: 60px; /* Invoice margin */
    line-height: normal;
}

div.title div.watermark h2 {
    font-family: serif;
    text-transform: uppercase;
    font-weight: bold;
    padding: 10px 7px;
    border-radius: 10px;
    opacity: 0.8;
    text-align: center;
    width: 130px;
    float:right;
}

div.title div.watermark h2.green {
    color: green;
    border: 3px solid green;
}

div.title div.watermark h2.red {
    color: red;
    border: 3px solid red;
}

table tr.information td {
    padding-bottom: 4px;
}

/* Customer billing address */
table tr.information td:nth-child(3){
    text-align: right;
}

table tr.heading th:nth-child(1) {
    width: 50%;
}

table tr.heading th:nth-child(1),
table tr.item td:nth-child(1) {
    text-align: left;
}

table tr.heading th {
    font-weight: bold;
    color: #FFFFFF;
    text-align: center;
}

table tr.heading th.total,
table tr.heading th.total_ex_vat,
table tr.heading th.total_incl_vat,
table tr.item td.total,
table tr.item td.total_ex_vat,
table tr.item td.total_incl_vat {
    text-align: right;
}

table tr.item td {
    border-bottom: 1px solid #eee;
    text-align: center;
}

table tr.spacer td {
    padding-top: 20px;
}

/* Totals */
table tr.total td.border {
    border-top: 2px solid #eee;
    font-weight: bold;
}

small.shipped_via {
    display: none;
}

/* Dynamic class */
table tr.total td.order-total{
    border-top: 2px solid #000;
}

table.notes {
    margin-top: 40px;
}

div.terms {
    margin-top: 40px;
    position: absolute;
    bottom: 120px;
}

table.footer {
    padding-top: 1px;
    padding-bottom: 1px; /* Invoice margin */
    width: 100%;
}

table.footer tr td {
    vertical-align: bottom;
}

table.footer tr td:nth-child(2) {
    text-align: right;
}



.order-total{border-top:1px solid gray;border-bottom:1px solid gray;}
.cpi{ text-transform: capitalize;}
</style>
<div>
<table cellpadding="0" cellspacing="0" style="margin-top:0;padding-top:0;" >
        <tr><td colspan="2" style="margin-top:0;text-align:center;padding-top:10px; padding-bottom:10px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Mobile Phone Receipt Note</strong></td></tr>
        <tr><td colspan="2" style="margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>PAN Number: ADNFS9426Q</strong></td></tr>
        <tr><td colspan="2" style="margin-top:0;text-align:center;padding-bottom:4px;font-size:14px;border-left:1px solid gray;border-right:1px solid gray;" ><strong>M/S SOUM</strong></td></tr>
        <tr><td colspan="2" style="margin-top:0;text-align:center;padding-bottom:4px;font-size:14px;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Front Shop of Smart Solutions, Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav Tower, Malviya Nagar Jaipur (Raj.) 302017 </strong></td></tr>
        <tr>
        <td style="margin-top:0;text-align:center;padding-bottom:4px;font-size:14px;border-left:1px solid gray;" ><strong>Mobile:</strong> 9829300040</td>
        <td style="margin-top:0;text-align:center;padding-bottom:4px;font-size:14px;border-right:1px solid gray;" ><strong>Email:</strong> ashishleekha@gmail.com</td>
        </tr>
</table>
<table cellpadding="0" cellspacing="0" style="margin-top:0;padding-top:0;" >

    <?php


    if(isset($_REQUEST['req_id'])){
					/** BOF Security Patch IS-002*/
		$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
		$dealerM=$db->prepare('select * from soum_receipt_note where id=?');
		$dealerM->bind_param('i', $poster_id);
		$dealerM->execute();
		$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/
		 while($row=$res->fetch_assoc()){
			$name=$row['name'];
			$mob=$row['mobile'];

			$cn_number=$row['cn_number'];


			$color=$row['colour'];
			$price=$row['price'];
			$brand=$row['brand'];
			$model=$row['model'];
			$quantity=$row['quantity'];
			$imi_no=$row['imi_no'];


			  $sql="select * from soum_prod_subcat where prod_subcat_id=$brand";
									  $res1=$db->query($sql);
									  while($row1=$res1->fetch_assoc()){
									    $brand =    $row1['prod_subcat_desc'];
									  }
									    $sql="select * from soum_prod_subsubcat where prod_subsubcat_id=$model";
									  $res2=$db->query($sql);
									  while($row2=$res2->fetch_assoc()){
									    $model =    $row2['prod_subcat_desc'];
									  }

									  $sql="select * from soum_colors where id=$color";
									  $res3=$db->query($sql);
									  while($row3=$res3->fetch_assoc()){
									    $color =    $row3['title'];
									  }
if($row['model']==0){
  $model = $row['other_model'];
}


			$date_d = $row['date_d'];
			$date_d= date("d/m/Y",$date_d);
		?>

	 <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Party Name :</strong><?php echo $name; ?></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:right;" ><strong>CN Number: </strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><?php echo $cn_number; ?></td>
	 </tr>
	 <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:right;" ><strong>Date: </strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><?php echo $date_d; ?></td>
	 </tr>
	  <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:right;" ><strong>Place of delivery: </strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >Jaipur</td>
	 </tr>
	 <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Mobile Number</strong> <?php echo $mob; ?></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:right;" ></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ></td>
	 </tr>
	  <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong>DESCRIPTION OF GOODS</strong></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong>Quantity</strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong>AMOUNT</strong></td>
	  </tr>
     <tr class="informatio" >
	 		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >
			<strong>Details of mobile</strong>
			<p>HANDSET: <?php echo $brand.' '. $model ;?></p>
			<p>COLOUR:<?php echo $color; ?></p>
			<p>IMEI NO:<?php echo $imi_no; ?></p>


			</td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><?php echo $quantity; ?></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><?php echo $price; ?></td>
	 </tr>
	 <tr>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong>Total</strong></td>
		<td width="20%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong></strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:center;" ><strong><?php echo $price; ?></strong></td>
	 </tr>
	 <tr>
		<td colspan="3" style="margin-top:0;padding-top:6px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Amount in words:</strong>
		<u style="text-transform:uppercase;text-decoration: none;"><?php echo getIndianCurrency($price);?> Only.</u></td>
	 </tr>


	<?php

		}
}





?>
	  <tr>
		<td colspan="3" style="margin-top:0;padding-top:10px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-bottom:1px solid gray;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >
		<strong>Terms & Conditions:</strong>
		<p>1. Goods once sold, cant be returned.</p>
		<p>2. All Goods sold are used second hand mobiles.</p>
		<p>3. Photocopy of either Self Attested Documents is required:- Voter ID, Aadhar Card, Driving License, Passport.</p>
		<p>4. All laws are subject to Jaipur Jurisdiction.</p>
		</td>
	 </tr>
</table>
    <div id="pos_customer_info" style="margin-top:30px;">
        <table class="customer-info">
            <tbody>

                <tr>
                   <td style="margin-top:0;padding-top:10px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-bottom:1px solid gray;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >
	               <p style="font-size:30px;text-align:right;padding-right:30px;"> FOR SOUM</p>
	               <p style="font-size:15px;text-align:left;padding-right:30px;">Signature of Seller_______________</p>
	               <p style="font-size:20px;text-align:right;padding-right:30px;text-transform:uppercase;">Authorized Signatory</p>
				   </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php


function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . ' ' : '') . $paise;
    //return $Rupees;
}


 ?>

﻿<?php
    include('../config2.php');    ?>
<style>
h1, h2, h3, h4, h5, h6{
    padding:0;
    margin:0;
}
table, div {
    font-family: dejavusanscondensed, Arial, sans-serif;
}
table {
    width: 100%;
    line-height: normal;
    color: #000;
    font-size: 12px;
    margin-left: 0px; /* Invoice margin */
    margin-right: 0px; /* Invoice margin */
}

table td, table th {
    padding-left:0px;
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
.maindiv{width:96%;margin-left:20px;}
.top_td{
	text-align:center;
    padding-top:10px; padding-bottom:10px;
	font-size:14px;border-top:1px solid gray;
	border-left:1px solid gray;
	border-right:1px solid gray;
	}
.logo_td{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-left:1px solid gray;
	border-right:1px solid gray;
	width:65%;

}
.logo_td_2{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;

}
.logo_td_3{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;

}
.logo_td_copy{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-left:1px solid gray;
	border-right:1px solid gray;
	width:65%;
	text-align:center;
	font-size:14px;

}
.place_td{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	width:35%;
	text-align:center;
	font-size:14px;

}
.bill_td{
	margin:0;
	border-top:1px solid gray;
	border-left:1px solid gray;
	border-right:1px solid gray;
	width:65%;
	text-align:center;
	font-size:14px;

}
.bill_to_h{
	font-size:14px;
	border-bottom:1px solid gray;
	width:20%;
	text-align:left;
	padding:10px;
	border-right:1px solid gray;
}
.bill_to_a{
	font-size:14px;
	border-bottom:1px solid gray;

	text-align:center;
	padding:10px;


}
.col_1{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:10%;
	text-align:center;
	font-size:14px;
}
.col_2{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:20%;
	text-align:center;
	font-size:14px;
}
.col_3{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:20%;
	text-align:center;
	font-size:14px;
}
.col_4{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:10%;
	text-align:center;
	font-size:14px;
}
.col_5{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:20%;
	text-align:center;
	font-size:14px;
}
.col_6{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:20%;
	text-align:center;
	font-size:14px;
}
.col_total{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:50%;
	text-align:center;
	font-size:14px;
}
.col_Words{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:10%;
	text-align:center;
	font-size:14px;
}
.col_Words_2{
	margin:0;
    padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid gray;
	border-right:1px solid gray;
	border-left:1px solid gray;
	width:90%;
	text-align:left;
	font-size:16px;
	padding-left:5px;
}
.border-p{
	text-align:left;padding: 5px 0 10px 10px;border-bottom:1px solid gray;
}
.border-p-last{
	text-align:left;padding: 5px 0 5px 10px;
}

</style>
<div class="maindiv">
<table cellpadding="0" cellspacing="0" >
        <tr><td colspan="2" class="top_td" ><strong style="text-transform: uppercase;">tax invoice</strong></td></tr>
        <tr><td colspan="2" class="top_td" ><strong style="text-transform: uppercase;">For Customer</strong></td></tr>
        <!--<tr><td colspan="2" ><strong>PAN Number: ADNFS9426Q</strong></td></tr>-->
</table>
<?php
     if(isset($_REQUEST['req_id'])){
        			/** BOF Security Patch IS-002*/
		$poster_id=mysqli_real_escape_string($db,$_REQUEST['req_id']);
		$dealerM=$db->prepare('select * from soum_bill_of_supply where id=?');
		$dealerM->bind_param('i', $poster_id);
		$dealerM->execute();
		$res=$dealerM->get_result();
					/** EOF Security Patch IS-002*/
		 while($row=$res->fetch_assoc()){
			$party_gst = $row['party_gst'];
			$party_address = $row['party_address'];
			$name=$row['name'];
			$mob=$row['mobile'];

			$cn_number=$row['cn_number'];


			$color=$row['colour'];
			//$price=$row['price'];
			$brand=$row['brand'];
			$model=$row['model'];
			$quantity=$row['quantity'];
			$imi_no=$row['imi_no'];
			$receipt_cn_no=$row['receipt_cn_no'];

			$net_banking = $row['net_banking'];
			$mobile_wallet = $row['mobile_wallet'];
			$cash = $row['cash'];
			$bank_cards = $row['bank_cards'];

			$price = $net_banking+$mobile_wallet+$cash+$bank_cards;


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
			$receipt_date =$row['receipt_date'];
			$receipt_date= date("d/m/Y",$receipt_date);


			$sqlimi="select * from soum_receipt_note where imi_no = '".$imi_no."' ORDER BY id DESC limit 1;";
			$resimi = $db->query($sqlimi);
			$priceproduct  = 0;
		if(mysqli_num_rows($resimi)>0){
			while($rowime=$resimi->fetch_assoc())
			{
				$priceproduct  =  $rowime['price'];

			}

		}
			?>
   <table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
        <tr>
			<td class="logo_td" >
				<div style="padding-left:80px;padding-top:10px;width:25%;float: left;">
				  <img src="https://soum.co.in/img/logo.jpg" style="height: 65px;width:50%;" alt="Services Online Used Mobile">
				</div>
				<div style="width:50%;float:left;font-size:16px;">
				   <strong>M/S SOUM</strong><br>
				   <strong>Front Shop of Smart Solutions, Haldiya Tower, 25 Kalyan Colony, Opp. Gaurav Tower, Malviya Nagar Jaipur (Raj.) 302017 </strong><br>
				   <strong>Mobile:</strong> 9829300040 <br>
				   <strong>GST Number:</strong> 08ADNFS9426Q1ZY
				</div>
		    </td>
			<td class="logo_td_2" >
			  <table style="width: 100%;margin: 0;padding: 0;">
				<tr><td  style="margin-top:0;text-align:center;padding-top:10px;padding-bottom:10px;font-size:14px;border-bottom:1px solid gray;"><strong style="text-transform: uppercase;">Invoice NO</strong></td></tr>
				<tr><td style="text-align: center;padding: 10px;font-size: 14px;"><strong style="text-transform: uppercase;"><?php echo $receipt_cn_no; ?>/2021-22</strong></td></tr>
			  </table>
		    </td>
			<td class="logo_td_3" >
			  <table style="width: 100%;margin: 0;padding: 0;">
				<tr><td  style="margin-top:0;text-align:center;padding-top:10px;padding-bottom:10px;font-size:14px;border-bottom:1px solid gray;"><strong style="text-transform: uppercase;">Date</strong></td></tr>
				<tr><td style="text-align: center;padding: 10px;font-size: 14px;"><strong style="text-transform: uppercase;"><?php echo $date_d ?></strong></td></tr>
			  </table>
		    </td>

		</tr>
 </table>
<table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
      <tr>
		<td class="logo_td_copy" ><strong>Bill To</strong></td>
		<td class="place_td" ><strong>Place of Supply </strong></td>
      </tr>
    <tr>
		<td class="bill_td" >
		<table>
			<tr>
              <td class="bill_to_h"><strong>Party Name </strong></td>
              <td class="bill_to_a"><strong><?php echo $name; ?></strong></td>
             </tr>
			 <tr>
              <td class="bill_to_h"><strong>Address </strong></td>
              <td class="bill_to_a"><strong><?php echo nl2br($party_address); ?></strong></td>
             </tr>
			 <tr>
              <td class="bill_to_h" style="border-bottom:none;"><strong>Mobile Number </strong></td>
              <td class="bill_to_a" style="border-bottom:none;"><strong><?php echo $mob; ?></strong></td>
             </tr>

         </table>
		</td>
		<td class="place_td" >&nbsp;  Jaipur</td>
		<!--<td style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;text-align:right;width:30%;" ><strong>CN Number: </strong></td>
		<td width="40%" style="margin-top:0;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;width:30%;" ><?php echo $cn_number; ?></td>-->
	 </tr>
</table>
<table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	  <tr>
		<th class="col_1"><strong>Sno</strong></th>
		<th class="col_2"><strong>Description </strong></th>
		<th class="col_3"><strong>IMEI </strong></th>
		<th class="col_4"><strong>Qty</strong></th>
		<th class="col_5"><strong>Taxable Value</strong></th>
		<th class="col_6"><strong>Item Price</strong></th>
	  </tr>
     <tr class="informatio" >
	       <td class="col_1"><strong>1</strong></td>
	       <td class="col_2"><strong><?php echo $brand.' '. $model ;?>(<?php echo $color; ?>)-(<?php echo $receipt_cn_no; ?>)</strong></td>
		   <td class="col_3"><strong><?php echo $imi_no; ?></strong></td>
		   <td class="col_4"><strong><?php echo $quantity; ?></strong></td>
		   <td class="col_5"><strong><?php  $taxablevalue = $price - $priceproduct;
		          $taxable = $taxablevalue/1.18;
		          $t_gst = $taxable*0.18;
		          $t_scgst = $taxable*0.09;
				 echo number_format($taxable,2);

		   ?></strong></td>
		   <td class="col_6"><strong><?php echo number_format($price,2); ?></strong></td>
	 </tr>
</table>
<table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	 <tr>
		<td class="col_total"><strong>Total</strong></td>
		<td class="col_4" ><strong><?php echo $quantity; ?></strong></td>
		<td class="col_5" ><strong><?php echo number_format($taxable,2); ?></strong></td>
		<td class="col_6" ><strong><?php echo number_format($price,2); ?></strong></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	 <tr>
		<td class="col_Words" ><strong>Total in Words:</strong></td>
	    <td class="col_Words_2" >
		<u style="text-transform:uppercase;text-decoration: none;text-align:left;">
		<?php echo getIndianCurrency($price);?> Only.</u> </td>
	 </tr>
</table>
<table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	<?php /* ?> <tr>
		<td colspan="3" style="margin-top:0;padding-top:6px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" ><strong>Amount breakdown:</strong>
			<br>
			<u style="text-transform:uppercase;text-decoration: none;">
		 <?php if($net_banking>0){ ?>
		   &nbsp; &nbsp; <?php echo number_format($net_banking,2) ?> (NetBanking)<br>
		 <?php } ?>
		  <?php if($mobile_wallet>0){ ?>
		   &nbsp; &nbsp; <?php echo number_format($mobile_wallet,2)?> (Mobile Wallet)<br>
		 <?php } ?>
		  <?php if($cash>0){ ?>
		   &nbsp; &nbsp; <?php echo number_format($cash,2)?> (Cash)<br>
		 <?php } ?>
		  <?php if($bank_cards>0){ ?>
		  &nbsp; &nbsp; <?php echo number_format($bank_cards,2)?> (Bank Cards)<br>
		 <?php } ?>
		</u>

		</td>
	 </tr><?php */ ?>

      <tr>
		<th class="col_2" style="width:50%;"><strong>Bank Details </strong></th>
		<!--<th class="col_3" style="width:25%;"><strong>UPI ID </strong></th>-->
		<th class="col_5" style="width:20%;text-align:left;padding-left:10px;"><strong>Exempted Value</strong></th>
		<th class="col_4" style="text-align:right;"><strong><?php echo $priceproduct; ?></strong>&nbsp;&nbsp;</th>
	 </tr>
     <tr class="informatio" >

	       <td class="col_2">
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:54px;">Name</strong> SOUM </p>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:22px;">IFSC Code</strong> HDFC0001377 </p>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:45px;">A/c No.</strong> 50200029460106 </p>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:45px;">Branch</strong> HDFC Bank, Raja Park </p>
		  </td>
		   <!--<td class="col_3"><strong>abcd@ybl</strong>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:54px;">Phone Pay</strong> </p>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:22px;">G Pay</strong> </p>
		    <p style="text-align:left;padding: 5px 0 5px 10px;" > <strong style="margin-right:45px;">Paytm</strong> </p>
          </td>-->

		   <td class="col_5">
			<p class="border-p" > <strong>Taxable Value</strong> </p>
			<p class="border-p" > <strong>Add: SGST</strong> </p>
			<p class="border-p" > <strong>Add: CGST</strong> </p>
			<p class="border-p-last" > <strong>Total GST</strong> </p>
		  </td>
		   <td class="col_4">
		     <p class="border-p" style="text-align:right;" > <strong><?php echo number_format($taxable,2); ?></strong>&nbsp;&nbsp; </p>
			 <p class="border-p" style="text-align:right;"> <strong><?php echo number_format($t_scgst,2); ?></strong> &nbsp;&nbsp;</p>
			 <p class="border-p" style="text-align:right;"> <strong><?php echo number_format($t_scgst,2); ?></strong> &nbsp;&nbsp;</p>
			 <p class="border-p-last" style="text-align:right;"> <strong><?php echo number_format($t_gst,2); ?></strong>&nbsp;&nbsp; </p>
		   </td>
	 </tr>
	 </table>
    <table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	<tr>
		<th class="col_2" style="width:50%;"><strong>Terms & Conditions:</strong></th>
		<th class="col_3" style="width:20%;text-align:left;padding-left:10px;""><strong>Total Amount after Tax </strong></th>
		<th class="col_5" style="width:10%;text-align:right;"><strong><?php echo number_format($price,2); ?></strong>&nbsp;&nbsp;</th>
    </tr>
	</table>

<?php
    }
  }
?>
  <table cellpadding="0" cellspacing="0" style="margin:0;padding:0;" >
	  <tr>
		<td style="width:50%;margin-top:0;padding-top:10px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-bottom:1px solid gray;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >
		  <p>&nbsp;&nbsp;1) Goods once sold will not be exchanged or taken back.</p>
		  <p>&nbsp;&nbsp;2) All disputes are subject to Jaipur Jurisdiction only.</p>
		  <p>&nbsp;&nbsp;3) Amount is non refundable.</p>
		  <p>&nbsp;&nbsp;4) 7 Days Guarantee of non warranty phones.</p>
		  <p>&nbsp;&nbsp;5) Taxable Value is determined in accordance with Sec 15(5) of CGST Act 2017 r/w Rule 32(5) of CGST Rules 2017.</p>

		</td>
		<td style="width:30%;margin-top:0;padding-top:10px;padding-bottom:4px;font-size:14px;margin-top:0; padding-bottom:4px;font-size:14px;border-bottom:1px solid gray;border-top:1px solid gray;border-left:1px solid gray;border-right:1px solid gray;" >
		     <br>
		     <br>
		     <br>
		     <br>
		     <br>
		     <br>
			<p style="font-size:18px;text-align:center;border-top:1px solid gray;">Authorized Signatory</p>
		</td>
	 </tr>
 </table>

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

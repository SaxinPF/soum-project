<?php
	include("../config.php");
	
	$track_id=$_REQUEST['track_id'];
	if ($_REQUEST['ord_id'])
		$ord_id=$_REQUEST['ord_id'];
	else
		$ord_id=substr($track_id,3,4)*1;
	
	$token_type=substr($track_id,0,1);
	
	if ($token_type=="O")
	{
		$token_name="Order";
		$sql="select order_token token,order_date date1,status,mail,mobile from soum_order_master where order_token='$track_id'";
	}	
	elseif ($token_type=="R")
	{
		$token_name="Repair";
		$sql="select token_id token,rep_ddtm date1,status,email mail,mobile_no mobile from soum_phone_repairing where token_id='$track_id'";
	}
	elseif ($token_type=="E")
	{
		$token_name="Enquiry";
		$sql="select enq_token token,enq_dttm date1,status,enq_email mail,enq_mob mobile from soum_enquire where enq_token='$track_id'";
	}	
	elseif ($token_type=="N" || $token_type=="U")
	{  
	 
		$token_name="Advertisement";
		$sql="select prod_id,code token,post_date date1,active status from soum_product_master where code='$track_id'";
        
	}   	
 $res=$db->query($sql);
 $row=$res->fetch_assoc();
 $status=$row['status'];
 $pid=$row['prod_id'];
 if ($token_type=="O")
	{
     if($status==0){ $st='Pending';}else if($status==1){ $st='In Process';}else if($status==2){ $st='Advance';}else if($status==3){ $st='Dishpatched';}
    }
    elseif ($token_type=="N" || $token_type=="U")
    {
      if($status==0){ $st='Under approval';}else if($status==1){ $st='Approved';}
      
      
       $sqlv="select count(1) view from soum_view_count where prod_id=$pid";
       $res1=$db->query($sqlv);
       $row1=$res1->fetch_assoc();
       $views=$row1['view'];
    }
    else
    {
      if($status==0){ $st='Pending';}else if($status==1){ $st='In Process';}else if($status==2){ $st='Delivered';}
    }
    
   
 
 $dob_by_chris=$row['date1'];
	$b_y=substr($dob_by_chris,0,4);							
	$b_m=substr($dob_by_chris,5,2);							
	$b_d=substr($dob_by_chris,8,2);
	$b_t=substr($dob_by_chris,11,8);							
$dttm=$b_d."-".$b_m."-".$b_y." ".$b_t;
$mail=$row['mail'];
$mob=$row['mobile'];
$token=$track_id;
/***************************************************************************************************/     
       if($token_name=='Order')      
         $msg='Status for token Id '.$token.' has been updated to "'.$st.'".  Thank you - Team Soum';
       if($token_name=='Repair')
         $msg='Status for Repairing Id '.$token.' has been updated to "'.$st.'".  Thank you - Team Soum.';
       if($token_name=='Enquiry')
         $msg='Status for Enquiry Id '.$token.' has been updated to "'.$st.'".  Thank you - Team Soum.';
       if($token_name=='Advertisement')
         $msg='Status for Advertisement Id '.$token.' has been updated to "'.$st.'".  Thank you - Team Soum.';
       
       
       
       $message = urlencode($msg);
       $url="http://t.dialmenow.info/sendsms.jsp?user=soum4u&password=soum4u12&mobiles=".$mob."&sms=".$message."&senderid=MYSOUM";
       $ret = file($url);       
/******************************************************************************************************/
?>						
					
					<div class="col-md-12 track-1" style="padding:0px;width:100%;float:left;">
						<div class="col-md-6" style="padding:0px;">
							<table class="mobile-style32">
								<tr>
									<td class="auto-style1" style="width:50%;"><strong>Present Status:</strong></td>
									<td class="auto-style1" style="width:50%;"><?=$st;?></td>
								</tr>
							</table>
							<table class="mobile-style32">
								<tr>
									<td class="auto-style1" style="width:50%;"><strong>Category &amp; Title:</strong> </td>
									<td class="auto-style1" style="width:50%;"><?=$token_name;?></td>
								</tr>
							</table>
						</div>
						
						<div class="col-md-6" style="padding:0px;">
							<table class="mobile-style32">
								<tr>
									<td class="auto-style1" style="width:50%;"><strong>Creation Date:</strong></td>
									<td class="auto-style1" style="width:50%;"><?=$dttm;?></td>
								</tr>
							</table>
							<table class="mobile-style32">
								<tr>
									<td class="auto-style1" style="width:50%;"><strong>Contact Details:</strong></td>
									<td class="auto-style1" style="width:50%;"><?=$dtl.", ".$mob;?></td>
								</tr>
							</table>
						</div>	
						<div class="col-md-12" style="padding:0px;">
							<table style="width:100%;float:left;">
								<tr>
									<td class="auto-style1"><strong>Details:</strong></td>
									<td class="auto-style1"><?=$mail;?></td>
								</tr>
								<tr>
									<td class="auto-style1"><strong>Description:</strong></td>
									<td class="auto-style1"><?="Views ".$views;?></td>
								</tr>
							</table>
						</div>				
					</div>
					
					

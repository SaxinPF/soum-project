<?php
include('config.php');
$mob=$_REQUEST['mob'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$add=$_REQUEST['add'];
$zip=$_REQUEST['zip'];
$act=$_REQUEST['param'];
$cid=$_REQUEST['cid'];
$type=$_REQUEST['type'];
$reg_dt=date('Y-m-d H:i:s');
if($act=='add')
{

    if($type=='Customer')
    {
	    $a=1;   
		$utype=$type;									
		$t="CRN";
		$sql=$db->prepare("insert into soum_master_customer(reg_date,user_type,fname,mobile,active)values(?,?,?,?,?)");
		$sql->bind_param("sssss",$reg_dt,$utype,$name,$mob,$a); 									
										
			
		$res=$sql->execute();
		$enq_id=mysqli_insert_id($db);
	
		$token=$t."".str_pad ($enq_id,4,'0', STR_PAD_LEFT);						        
		$token1=$db->prepare("update soum_master_customer set reg_id='$token' where cust_id=$enq_id");								
		$rest=$token1->execute();
	     if($res)
	     $r=$enq_id;
	     else
	     $r=0;
    }  
    
}
else if($act=="profile_update")
{
    if($type=='Customer')
    {
    $sql="update soum_master_customer set fname='$name',email='$email',address='$add',pincod='$zip',mobile='$mob' where cust_id='$cid'";
    }
    else if($type=='Dealer')
    {
     $sql="update soum_master_dealer set fname='$name',email='$email',address='$add',pincod='$zip',mobile='$mob' where cust_id='$cid'";
    
    }
    else if($type=='Admin')
    {
    $sql="update soum_master_admin set fname='$name',email='$email',address='$add',pincode='$zip',mobile='$mob' where usr_id='$cid'";
    }


    $result=$db->query($sql);
     if($result)
     $r=1;
     else
     $r=0;


}
else
{

    if($type=='Customer')
    {
    $sql="select * from soum_master_customer where mobile='$mob'";
    }
    else if($type=='Dealer')
    {
    $sql="select * from soum_master_dealer where mobile='$mob'";
    }
    else if($type=='Admin')
    {
    $sql="select * from soum_master_admin where mobile='$mob'";
    }


    $result=$db->query($sql);
    $r=array();
	while($row=$result->fetch_assoc())
	{
	    	$r[]=$row;

 	}
} 	
 echo $_GET['callback'] . '' . json_encode($r). '';

?>

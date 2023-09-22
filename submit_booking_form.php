<?php
if(ISSET($_POST))
{
	$name=$_POST['fullname'];
  $emailid=$_POST['emailid'];
	$mobile=$_POST['mobile'];
	$no_of_passenger=$_POST['no_of_passenger'];
  $pick_up_date=$_POST['pick_up_date'];
  $pstreet=$_POST['pstreet'];
	$pcity=$_POST['pcity'];
  $pzip_code=$_POST['pzip_code'];
  $vehicle_type=$_POST['vehicle_type'];
  $dstreet=$_POST['dstreet'];
  $dcity=$_POST['dcity'];
  $dzip_code=$_POST['dzip_code'];

  $field1="<b>Number Of Passenger:</b> ".$no_of_passenger."<br>"."<b>Pick Up Date:</b> ".$pick_up_date."<br>"."<b>Pick Up Address: </b>"."<br>"."Street: ".$pstreet."<br>"."City: ".$pcity."<br>"."Zip Code: ".$pzip_code."<br>"."<b>Vehicle Type:</b> ".$vehicle_type."<br>"."<b>Journey Type:</b> ".$side."<br>"."<b>Destination Address: </b>"."<br>"."Street: ".$dstreet."<br>"."City: ".$dcity."<br>"."Zip Code: ".$dzip_code;
  
}
else
{
echo "Thanks";	
exit();	
}

$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:payment.php");
exit();
?>
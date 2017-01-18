<?php
$id=$_REQUEST['id'];
$conn=new mysqli("localhost","root","root","Main_Site");
$sql=$conn->query("delete from Main_Product where id='$id'");
if($sql==true)
{
	$arr=array();
	$arr["main_id"]=$id;
	$data=json_encode($arr);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://localhost/Child_site/del.php");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,	CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data))); 
	curl_exec($curl);
	curl_close($curl);
	header('location:insert.php');
}
?>
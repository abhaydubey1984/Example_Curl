<?php
$pname=$_REQUEST['pname'];
$price=$_REQUEST['price'];
$brand=$_REQUEST['brand'];
$conn=new mysqli("localhost","root","root","Main_Site");
$str="insert into Main_Product(pname,price,brand) values('$pname',$price,'$brand')";
$sql=$conn->query($str);
if($sql==true)
{
	$last_id=mysqli_insert_id($conn);
	$arr=array();
	$arr["lid"]=$last_id;
	$arr["pname"]=$pname;
	$arr["price"]=$price;
	$arr["brand"]=$brand;
	$data_string = json_encode($arr);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://localhost/Child_site/insert.php");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,	CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
	$result = curl_exec($curl);
	curl_close($curl);
	header('location:insert.php');
}
?>
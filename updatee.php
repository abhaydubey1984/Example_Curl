<?php
	$id=$_REQUEST['id'];
    $pname=$_REQUEST['pname'];
    $price=$_REQUEST['price'];
    $brand=$_REQUEST['brand'];
    $conn=new mysqli("localhost","root","root","Main_Site");
	$str="update Main_Product set pname='$pname',price=$price,brand='$brand' where id=$id";
	//echo $str;
	$sql=$conn->query($str);
	$arr=array();
	$arr["lid"]=$id;
	$arr["pname"]=$pname;
	$arr["price"]=$price;
	$arr["brand"]=$brand;
	$data_string = json_encode($arr);
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://localhost/Child_site/child_update.php");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,	CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
	$result = curl_exec($curl);
	curl_close($curl);
	//echo $result;
	header('location:insert.php');

?>
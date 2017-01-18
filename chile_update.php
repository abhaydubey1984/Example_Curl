<?php
	$data = json_decode(file_get_contents("php://input"));
    $lid=$data->lid;
    $pname=$data->pname;
    $price=$data->price;
    $brand=$data->brand;
    $conn=new mysqli("localhost","root","root","Child_Site");
	$str="update Child_Product set pname='$pname',price=$price,brand='$brand' where main_id=$lid";
	//echo $str;
	$sql=$conn->query($str);
?>
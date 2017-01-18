<?php
	$data = json_decode(file_get_contents("php://input"));
    $lid=$data->lid;
    $pname=$data->pname;
    $price=$data->price;
    $brand=$data->brand;
    $conn=new mysqli("localhost","root","root","Child_Site");
	$str="insert into Child_Product(main_id,pname,price,brand) values($lid,'$pname',$price,'$brand')";
	$sql=$conn->query($str);
?>
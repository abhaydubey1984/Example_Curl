<?php
	$data = json_decode(file_get_contents("php://input"));
    $main_id=$data->main_id;
    $conn=new mysqli("localhost","root","root","Child_Site");
	$sql=$conn->query("delete from Child_Product where main_id=$main_id");
?>
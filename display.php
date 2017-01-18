<?php
	$conn=new mysqli("localhost","root","root","Main_Site");
	$sql=$conn->query("select * from Main_Product");
	$arr=array();
	while($dataa=$sql->fetch_assoc())
	{
		$arr[]=$dataa;
	}
	echo json_encode($arr);
	
?>
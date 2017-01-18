<?php
$data = json_decode(file_get_contents("php://input"));
$id=$data->id;
$conn=new mysqli("localhost","root","root","Main_Site");
$sql=$conn->query("select * from Main_Product where id=$id");
$arr=array();
while($dataa=$sql->fetch_assoc())
{
	$arr[]=$dataa;
}
echo json_encode($arr);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$id=$_REQUEST['id'];
$arr=array();
$arr["id"]=$id;
$data_string = json_encode($arr);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/Main_Site/getdata.php");
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,	CURLOPT_HTTPHEADER,array('Content-Type: application/json','Content-Length: ' .strlen($data_string))); 
$result = curl_exec($curl);
curl_close($curl);
$data=json_decode($result);
?>
<form method="post" action="updatee.php">
<table>
	<tr>
	<td>
	Product Name
	</td>
	<td>
	<input type="text" name="pname" value="<?php echo $data[0]->pname; ?>">
	</td>
	</tr>

	<tr>
	<td>
	Price
	</td>
	<td>
	<input type="text" name="price" value="<?php echo $data[0]->price; ?>">
	</td>
	</tr>

	<tr>
	<td>
	Brand
	</td>
	<td>
	<input type="text" name="brand" value="<?php echo $data[0]->brand; ?>">
	<input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="submit" value="Update">
	</td>
	</tr>
</table>
</form>

</body>
</html>


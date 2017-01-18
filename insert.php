<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<form method="post" action="insert_data.php">
<table>
	<tr>
	<td>
	Product Name
	</td>
	<td>
	<input type="text" name="pname">
	</td>
	</tr>

	<tr>
	<td>
	Price
	</td>
	<td>
	<input type="text" name="price">
	</td>
	</tr>

	<tr>
	<td>
	Brand
	</td>
	<td>
	<input type="text" name="brand">
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="submit" value="Insert">
	</td>
	</tr>
</table>
</form>
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/Main_Site/display.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
$data=json_decode(($result));
?>
<form method="post">
<table>
	<th>Product Name</th>
	<th>Price</th>
	<th>Brand</th>
	
	<?php
	for($i=0;$i<count($data);$i++)
	{
	?>
	<tr>
	<td><?php echo $data[$i]->pname; ?></td>
	<td><?php echo $data[$i]->price; ?></td>
	<td><?php echo $data[$i]->brand; ?></td>
	<td><a href="update.php?id=<?php echo $data[$i]->id; ?> ">Update</a></td>
	<td><a href="del.php?id=<?php echo $data[$i]->id; ?> ">Delete</a></td>

	</tr>
	<?php
	}
?>
</table>
</form>
</body>
</html>
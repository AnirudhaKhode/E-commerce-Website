<form>
<table>
<tr><td>Enter image Name<td><input type='text' name='img'></tr>
<tr><td>Enter Product ID<td><input type='text' name='prod_id'></tr>
<tr><td>Enter Name<td><input type='text' name='name'></tr>
<tr><td>Enter Product Description<td><textarea type='text' name='desc'></textarea></tr>
<tr><td>Enter Category<td><input type='text' name='category'></tr>
<tr><td>Enter Brand<td><input type='text' name='brand'></tr>
<tr><td>Enter Price<td><input type='text' name='price'></tr>
<tr><td>Enter Available Quantity<td><input type=text name='qty'></tr>
<tr><td><button type=submit class="btn btn-primary">Add Product</button></tr>
</table>
</form>

<?php
session_start();
$_SESSION['admin_id']='admin01@gmail.com';
$_SESSION['admin_password']='admin01@123';
if(isset($_GET['prod_id']))
{
	$img=$_GET['img'];
	$prod_id=$_GET['prod_id'];
	$name=$_GET['name'];
	$desc=$_GET['desc'];
	$category=$_GET['category'];
	$brand=$_GET['brand'];
	$price=$_GET['price'];
	$qty=$_GET['qty'];
	echo $img;
	include("myconnection.php");
	$sql="insert into product values ('$img', '$prod_id', '$name', '$desc', '$category', '$brand', $price, $qty)";
	$con->query($sql);
	$con->close;
	header("location:addproduct.php");
	}



?>
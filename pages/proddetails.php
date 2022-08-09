<html>
<doctype!html>
<head>
<title>Product details page</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<style>

td,th
{
   padding:20px;
   padding-top:10px;
       
}
table
{
	float:right;
	margin-right:80px;
	font-size:17px;
}
.mx-auto
{
	width:250px;
	padding-top:80px;

}
</style>
</head>
<body>
<form method=post>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item"><a class='nav-link' href="index.php" style=color:white>Home</a></li>
	<li class="nav-item"><a class='nav-link' href="Cart.php" style=color:white>My Cart</a></li>
	<li class="nav-item"><a class='nav-link' href="MyOrders.php" style=color:white>My Orders</a></li>
	<li class="nav-item"><a class='nav-link' href="register.php" style=color:white>Create Account</a></li>
	<li class="nav-item"><a class='nav-link' href="login.php" style=color:white>Login</a></li>
	<li class="nav-item"><a class='nav-link' href="logout.php" style=color:white>Logout</a></li>
	<li class="nav-item" style=float:right>
	<div class="input-group mb-3" style=margin-left:20rem>
  		<input type="text" class="form-control" placeholder="Search">
  		<div class="input-group-append">
    	<button class="btn btn-light" type="submit" style=margin-left:0.3rem>Go</button>
  		</div>
	</div>
	</li>
  </ul>
</nav>
</form>
</body>
</html>
<div class="container">
<?php
session_start();
if(isset($_SESSION["uid"]))
{echo "<p style=color:#4ecce6><img src='../images/profilelogo.png' style=width:50px>  $_SESSION[uid]</p><br>";}
if(isset($_GET['prod_id']))

	$prod_id=$_GET['prod_id'];
	$_SESSION["prod_id"]=$prod_id;
	include("myconnection.php");
    $r=$con->query("select * from product where Prod_ID='$prod_id'");
	while($row=$r->fetch_assoc())
	{
	echo "<a href=../images/$row[Prod_Image]><img src='../images/$row[Prod_Image]' class=mx-auto></a>";
	echo "<table><th></th><th></th>";
	echo "<tr><td><h3>$row[Prod_Name]</h3></td><td></td></tr>";
	echo "<tr><td><label>Product ID: </label></td><td>$row[Prod_ID]</td></tr>";
	echo "<tr><td><label>Description: </label></td><td>$row[Prod_Desc]</td></tr>";
	echo "<tr><td><label>Category: </label></td><td>$row[Category]</td></tr>";
	echo "<tr><td><label>Brand: </label></td><td>$row[Brand]</td></tr>";
	echo "<tr><td><label>Price: </label></td><td>$row[Prod_Price]</td></tr>";
	echo "<tr><td><label>Available Quantity: </label></td><td>$row[Prod_Qty]</td></tr>";
	echo "<tr><td><form method=post action=addtocart.php >";
	echo "Quantity <input type=number value=1 name=prod_qty style=height:40px;width:50px min=1 max=$row[Prod_Qty] >";	
	echo " <button class='bg-success' type=submit >Add to Cart</button></form></td></tr></table>";
	}
?>
</div>









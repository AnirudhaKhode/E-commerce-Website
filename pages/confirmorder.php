<html>
<doctype!html>
<head>
<title>Confirm Order</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<style>
td,th
{
   text-align:center;
   padding:10px;
   padding-top:10px;
       
}
button
{
	border:none;
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
{echo "<p style=color:#4ecce6><img src='../images/profilelogo.png' style=width:50px>  $_SESSION[uid]</p><br>";
include("myconnection.php");
$r1=$con->query("select Name, PhoneNo, Address, City, State, Pin_Code from userdetail where EmailID='$_SESSION[uid]'");
echo "<h3>Confirm Shipping Details</h3><br>";
while($row1=$r1->fetch_assoc())
{
	echo"<table class=' table table-hover'><tr><td><b>User Name</b></td><td>$row1[Name]</td></tr>";
	echo"<tr><td><b>Phone No</b></td><td>$row1[PhoneNo]</td></tr>";
	echo"<tr><td><b>Shipping Address</b></td><td>$row1[Address] $row1[City] $row1[State] $row1[Pin_Code]</td></tr></table><br>";
}


$r2=$con->query("select Prod_Image, Prod_ID, Prod_Name, Prod_Price, Qty, Total_Price, Charge_Tax, Net_Price from cartdetail where EmailID='$_SESSION[uid]'");
echo "<h3>Confirm Order Details</h3>";
echo "<table class=' table table-hover'><th></th><th>Product ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total Price</th><th>Charge Tax</th><th>Net Price</th>";
$Total=0;
while($row2=$r2->fetch_assoc())
{
	echo "<tr><td>";
	echo "<a href=../images/$row2[Prod_Image]><img src='../images/$row2[Prod_Image]' style=width:100px class=mx-auto></a><br></td>";
	echo "<td>$row2[Prod_ID]</td>";
	echo "<td>$row2[Prod_Name]</td>";
	echo "<td>$row2[Prod_Price]</td>";
	echo "<td>$row2[Qty]</td>";
	echo "<td>$row2[Total_Price]</td>";
	echo "<td>$row2[Charge_Tax]</td>";
	echo "<td>$row2[Net_Price]</td>";
	$Total+=$row2['Net_Price'];
	
}
echo "<tr><td><td><td><td><td><td><td><b>Total Bill Amount: $Total</b></td></tr>";
echo "<tr><td><td><td><td><td><td><td><button class='bg-success' type=submit ><a href=order.php>Confirm Order</a></button></td></tr>";
echo "</tr>";
$con->close();
}
else
{
	header("location:login.php");
}

?>
</div>








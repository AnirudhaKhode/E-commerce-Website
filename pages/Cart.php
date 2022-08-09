<html>
<doctype!html>
<head>
<title>My Cart</title>
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
$r=$con->query("select Prod_Image, Prod_ID, Prod_Name, Prod_Price, Qty, Total_Price, Charge_Tax, Net_Price from cartdetail where EmailID='$_SESSION[uid]'");
echo "<table class=' table table-hover'><th></th><th>Product ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total Price</th><th>Charge Tax</th><th>Net Price</th>";
$Total=0;
while($row=$r->fetch_assoc())
{
	echo "<tr><td>";
	echo "<a href=../images/$row[Prod_Image]><img src='../images/$row[Prod_Image]' style=width:100px class=mx-auto></a><br></td>";
	echo "<td>$row[Prod_ID]</td>";
	echo "<td>$row[Prod_Name]</td>";
	echo "<td>$row[Prod_Price]</td>";
	echo "<td>$row[Qty]</td>";
	echo "<td>$row[Total_Price]</td>";
	echo "<td>$row[Charge_Tax]</td>";
	echo "<td>$row[Net_Price]</td>";
	echo "<td><button class='bg-success' type=submit ><a href=removefromcart.php?pid=$row[Prod_ID]>Remove</a></button></td>";
	echo "</tr>";
	$Total+=$row['Net_Price'];
	
}
if($Total==0)
{
	echo "</table>";
	echo "<h3 style=margin:5%;margin-left:35%>Your Cart is Still Empty<br>";
	echo "<button class='bg-success' type=submit ><a href=index.php>Go to Home</a></button></h3>";
}
else
{
echo "<tr><td><td><td><td><td><td><td><b>Total Bill Amount: $Total</b></td></tr>";
echo "<tr><td><td><td><td><td><td><td><button class='bg-success' type=submit style=width:80px;padding-top:5px><a href=confirmorder.php>Order</a></button></td></tr>";
}
$con->close();
}
else
{
	header("location:login.php");
}

?>
</div>








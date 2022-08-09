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
<script>
function ConfirmCancel(){
	alert("Do you really want to cancel this order!");
}

</script>
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
$r=$con->query("select 
orderdetail.Prod_ID,product.Prod_Image,product.Prod_Name,product.Prod_Desc,orderdetail.Order_No,orderdetail.Qty,orderdetail.Net_Price,orderdetail.Status from product, orderdetail
where orderdetail.Prod_ID=product.Prod_ID and orderdetail.Email='$_SESSION[uid]' order by Status desc;");
echo "<table class=' table table-hover'><th></th><th>Order ID</th><th>Product Name</th><th>Product Description</th><th>Quantity</th><th>Amount</th><th>Delivery Status</th><th></th>";
$Total=0;
while($row=$r->fetch_assoc())
{
	echo "<tr><td>";
	echo "<a href=../images/$row[Prod_Image]><img src='../images/$row[Prod_Image]' style=width:100px class=mx-auto></a><br></td>";
	echo "<td>$row[Order_No]</td><td><a href='proddetails.php?prod_id=$row[Prod_ID]' style=color:black >$row[Prod_Name]</a></td><td>$row[Prod_Desc]</td><td>$row[Qty]</td><td>$row[Net_Price]/-</td><td>$row[Status]</td>";
	if($row['Status']=='Ordered' or $row['Status']=='Shipped')
	{
		echo "<td><a href='CancelOrder.php?order_id=$row[Order_No]&&qty=$row[Qty]&&prod_id=$row[Prod_ID]'><button onclick='ConfirmCancel()' >Cancel Order</button></a></td>";
	}
	echo "</tr>";
	$Total+=$row['Net_Price'];
	
}
$con->close();
if($Total==0)
{
	echo "</table>";
	echo "<h3 style=margin:5%;margin-left:35%>No Orders Yet!<br>";
	echo "<button class='bg-success' type=submit ><a href=index.php>Go to Home</a></button></h3>";
}
}
else
{
	header("location:login.php");
}

?>
</div>








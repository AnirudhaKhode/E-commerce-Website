<html>
<Doctype!html>
<head>
<title>Register</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<style>
form
{
	padding:3%;
	margin-left:20%;
	
}
p
{
 padding-left:340px;
 color:red;
}
</style>
</head>
<body>
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
<div class="container "  >
<form method=post style=width:700px >
<label>Email Id</label><br><input type=text name='uid' placeholder="Enter Email"  class="form-control"><br>
<label>Name</label><br><input type=text name='name' placeholder="Enter Name" class="form-control"><br>
<label>Password</label><br><input type=password name='pwd' placeholder="Enter Password" class="form-control"><br>
<label>Age</label><br><input type=text name='age' placeholder="Enter Age" class="form-control"><br>
<label>Gender</label><br><input type=radio name='gender'value='Male' class='gender'> Male <input type=radio name='gender'value='Female' class='gender' > Female <br><br>
<label>Contact no.</label><br><input type=text name='phoneno' placeholder="Enter Contact no." class="form-control"><br>
<label>Building No.</label><br><input type=text name='buildingNo' placeholder='Eg. 310 or 120-A' class="form-control" ><br>
<label>Area</label><br><input type=text name='area' placeholder='Enter Area' class="form-control" ><br>
<label>City</label><br><input type=text name='city' placeholder='Enter city' class="form-control"><br>
<label>State</label><br><input type=text name='state' placeholder='Enter state' class="form-control"><br>
<label>Pincode</label><br><input type=text name='pincode' placeholder='Enter pincode' class="form-control"><br>
<button type=submit class="btn btn-primary">Signup</button> 
</form>
</div>
</body>
</html>
<?php
session_start();
if(isset($_POST['uid']))
{
$uid=$_POST['uid'];
$name=$_POST["name"];
$pwd=$_POST['pwd'];
$age=$_POST["age"];
$gender=$_POST["gender"];
$contactno=$_POST["phoneno"];
$building=$_POST["buildingNo"];
$area=$_POST["area"];
$address=$building.", ".$area;
$city=$_POST["city"];
$state=$_POST["state"];
$pincode=$_POST["pincode"];

include("myconnection.php");
$r=$con->query("insert into userdetail values ('$uid', '$name', '$pwd', $age, '$gender', $contactno, '$address', '$city', '$state', '$pincode' )");
header("location:login.php");
$con->close();
}

?>
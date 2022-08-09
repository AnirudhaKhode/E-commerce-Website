<html>
<Doctype!html>
<head>
<title>Login</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<style>
form
{
	padding:3%;
	margin-left:20%;
	margin-top:10%;	
}
button>a,button>a:hover
{
	text-decoration:none;
	color:white;
}
</style>
<script>
function ViewPass()
{
	if(document.getElementById("pwd").type=='text')
	{document.getElementById("pwd").type='password';}
	else
	{document.getElementById("pwd").type='text';}
}
</script>
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
<label>Email Id</label><br><input type=email name='uid' placeholder="Enter Email"  class="form-control"><br>
<label>Password</label><br><input type=password name='pwd' id='pwd' placeholder="Enter Password" class="form-control" ><br>
<input type=checkbox onclick='ViewPass()'> Show Password 
<a href="#" style=float:right>Forgot password?</a><br>
<p style=float:right>Don't have an account?<a href="register.php"  > Sign up</a></p><br>
<br>
<button type=submit class="btn btn-primary">Login</button>
</form>
</div>
</body>
</html>
<?php
session_start();
if(isset($_POST['uid']))
{$uid=$_POST['uid'];
$pwd=$_POST['pwd'];
include("myconnection.php");
$r=$con->query("select * from userdetail where EmailID='$uid' && Password='$pwd'");
if($row=$r->fetch_assoc())
{	
$_SESSION["uid"]=$row['EmailID'];
$_SESSION["pwd"]=$row['Password'];
header("location:index.php");
}
else
{
	echo "<p>Invalid User_id/password</p>";
}
$con->close();
}

?>
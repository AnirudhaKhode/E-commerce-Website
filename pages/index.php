<html>
<doctype!html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="../CSS/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../CSS/finalproject1.css">
</head>

<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav col-15">
    <li class="nav-item "><a class='nav-link' href="index.php" style=color:white>Home</a></li>
	<li class="nav-item "><a class='nav-link' href="Cart.php" style=color:white>My Cart</a></li>
	<li class="nav-item "><a class='nav-link' href="MyOrders.php" style=color:white>My Orders</a></li>
	<li class="nav-item "><a class='nav-link' href="register.php" style=color:white>Create Account</a></li>
	<li class="nav-item "><a class='nav-link' href="login.php" style=color:white>Login</a></li>
	<li class="nav-item"><a class='nav-link' href="logout.php" style=color:white>Logout</a></li>	
	</ul>	
  
  <div class="nav-item col-4"  style=float:left>
	<div class="input-group mb-3 " >
  		<input type="text" class="form-control" placeholder="Search for products, brands and more">
  		<div class="input-group-append">
    	<button class="btn btn-light" type="submit" style=margin-left:0.3rem>Go</button>
  		</div>
	</div>
</div>
</nav>
<div class="border border-top-0 border-right-0 border-left-0 col-15" style=padding-top:1rem; >
<span class='category col-2' style=margin-left:3.5%><img src='../images/mobiles.jpg'></span>
<span class='category col-2'><img src='../images/fashion.jpg'></span>
<span class='category col-2'><img src='../images/Electronics.jpg'></span>
<span class='category col-2'><img src='../images/home.jpg'></span>
<span class='category col-2 '><img src='../images/Applainces.jpg'></span>
<span class='category col-2'><img src='../images/Furniture.jpg'></span>
<span class='category col-2'><img src='../images/Groccery.jpg'></span>
<div><span class='col-2' style=margin-left:3%;text-align:center;  >Mobiles</span>
<span class='col-2' style=text-align:center; >Fashion</span>
<span class='col-2' style=text-align:center; >Electronics</span>
<span class='col-2' style=text-align:center; >Home</span></div>
<span class='col-2' style=text-align:center; >Appliances</span>
<span class='col-2' style=text-align:center;>Furniture</span>
<span class='col-2' style=text-align:center; >Groccery</span></div>

</div>

<div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:7%;padding:2%">

  <!-- Indicators -->
  <ul class="carousel-indicators" style="padding-bottom:0.3rem">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
	<li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
	<img src=../images/Slide1.jpg  width=100%>
    </div>
    <div class="carousel-item">
	<img src=../images/Slide2.jpeg  width=100%>
    </div>
    <div class="carousel-item">
	<img src=../images/Slide3.jpg  width=100%>
    </div>
	<div class="carousel-item">
	<img src=../images/Slide3.jpg  width=100%>
    </div>
    <div class="carousel-item">
	<img src=../images/Slide3.jpg  width=100%>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<?php
include("myconnection.php");
$r=$con->query("select distinct category from product;");

while($row=$r->fetch_assoc())
{
	echo "<div class='col-14' style='height: 30%;padding:0%;margin-left:3.31%;margin-top:1%;margin-bottom:1%'>";
	echo "<div class='col-2 category-label'  style='height: 100%;'>$row[category]</div>";
	$a= "select * from product where category='".$row['category']."'";
	$temp=1;
	$r2=$con->query($a);

    while($row2=$r2->fetch_assoc() and $temp<=3)
	{
		echo "<span class='col-3' style='height: 100%; width:23.5%;font-size: 80%;padding-top: 1%;border:1px solid #007BFF'>";
		echo "<image class='prod-image' src='../images/$row2[Prod_Image]' width=30% style='float:left;padding-right:3%'>";
		echo "<a href='proddetails.php?prod_id=$row2[Prod_ID]' style='text-decoration:none'>$row2[Prod_Name]</a><br>";
		echo "$row2[Prod_Desc]<br>";
		echo "at"." "."$row2[Prod_Price]"."/-";
		if($row2['Prod_Qty']==0)
		{
			echo "<p style=color:red>Out of stock</p>";
		}
		echo "</span>";
		$temp=$temp+1;
	}
	echo "<span class='col-1 category-label' style='height: 100%;border-radius:0%;width:6%;font-size:70%' ><a href='category.php'>View More</a></span>";
	echo "</div>";
}
$con->close();
?>
<footer class='col-15' style='height:35%'>
<div class='col-15' style='height:75%;background-color:#EBF4FD;padding:1%'>

<b>Important Links</b><br>
<a href='#'>Home</a><br>
<a href='#'>Cart</a><br>
<a href='#'>Orders</a><br>
<a href='#'>About Us</a><br>
<a href='#'>Contact Us</a><br>
<a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
</div>
<div class='col-15' style='height:25%;background-color:#007BFF;padding-top:1%;color:white'>
<center style="">Made with &#10084 by Anirudha Khode</center>
</div>
</footer>

</body>
</html>

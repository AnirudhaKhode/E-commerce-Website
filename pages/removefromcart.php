<?php
session_start();
$userid=$_SESSION["uid"];
$prod_id=$_GET["pid"];
include("myconnection.php");
$q="delete from cartdetail where EmailID='$userid' && Prod_ID='$prod_id'";
$r=$con->query($q);
$con->close();
header("location:Cart.php");
?>
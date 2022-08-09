<?php
session_start();
$userid=$_SESSION["uid"];
$order_no=$_GET["order_id"];
$prod_id=$_GET["prod_id"];
$qty=(int)$_GET["qty"];
include("myconnection.php");
$q="update orderdetail set Status='Cancelled' where Email='$userid' && Order_No='$order_no'";
$con->query($q);
// echo gettype($qty);
$con->query("update product set Prod_Qty= Prod_Qty + $qty WHERE Prod_ID = '$prod_id'");
$con->close();
header("location:MyOrders.php");
// echo "$order_no";
?>
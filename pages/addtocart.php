<?php
session_start();
if(isset($_SESSION["uid"]))
{
$userid=$_SESSION["uid"];
$prod_id=$_SESSION["prod_id"];
$qty=$_POST["prod_qty"];
include("myconnection.php");
$r=$con->query("select Prod_Name, Prod_Price, Prod_Image from product where Prod_ID='$prod_id'");

while($row=$r->fetch_assoc())
{
$prod_name=$row["Prod_Name"];
$prod_price=$row["Prod_Price"];
$total_price=($prod_price)*($qty);
$charge_tax=$total_price*(0.1);
$net_price=$total_price+$charge_tax;
$prod_image=$row["Prod_Image"];
}
$con->query("insert into cartdetail values ( '$userid', '$prod_id', '$prod_name', $prod_price, $qty, $total_price, $charge_tax, $net_price, '$prod_image') ");
$con->close();
}
header("location:Cart.php");


?>
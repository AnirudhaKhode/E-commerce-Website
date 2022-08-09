<?php
session_start();
include('myconnection.php');
$r1=$con->query("select * from cartdetail where EmailID='$_SESSION[uid]' ");

while($row1=$r1->fetch_assoc())
{
	$orderno=strval(rand(10,10000000));
	$b=$orderno."/".$row1['Prod_ID'];
	$con->query("insert into orderdetail values ( '$b' , '$_SESSION[uid]' , '$row1[Prod_ID]' , '$row1[Qty]' , '$row1[Net_Price]' , 'Ordered' )");
	$r2=$con->query("select * from product where Prod_ID='$row1[Prod_ID]'");
	while($row2=$r2->fetch_assoc())
	{
		$row2['Prod_Qty']-=$row1['Qty'];
		$con->query("update product set Prod_Qty=$row2[Prod_Qty] where Prod_ID='$row1[Prod_ID]' ");
	}

	$con->query("delete from cartdetail where EmailID='$_SESSION[uid]' and Prod_ID='$row1[Prod_ID]'");
}
$con->close();
header("location:index.php");

?>
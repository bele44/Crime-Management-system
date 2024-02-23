<?php
	include('connection.php');
$id=$_GET['id'];
$query3=mysqli_query($con,"select * from orders where status='unseen' and order_id='$id'");
if($row=mysqli_fetch_assoc($query3))
$query1=mysqli_query($con,"UPDATE orders SET  status='seen' where order_id='$id'");
	
if ($query1)
{
$x='<script type="text/javascript">alert("the ordered is accepted  !!!");
window.location=\'ViewOrder.php\';</script>';
echo $x;
}
?>
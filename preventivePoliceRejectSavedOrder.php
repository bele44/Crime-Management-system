<?php
include("connection.php");
if(isset($_GET['id']))
{
	$noid=$_GET['id'];
	$select_status=mysql_query("select * from orders where order_id='$noid'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->noid;
	

	$delete=mysql_query("DELETE FROM  orders WHERE order_id='$noid' ");
	if($delete)
	{
		header("Location:saved_orderpreventivepolice.php");
	}
	else
	{
		echo "failed to reject orders !";
	}
	}
	?>
     
    <?php
}
?>
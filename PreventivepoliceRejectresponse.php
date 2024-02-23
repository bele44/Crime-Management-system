<?php
include("connection.php");
if(isset($_GET['Response_id']))
{
	$Response_id=$_GET['Response_id'];
	$select_status=mysql_query("select * from responsecomplaintaccount where Response_id='$Response_id'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->Response_id;
	

	$delete=mysql_query("DELETE FROM  responsecomplaintaccount WHERE Response_id='$Response_id' ");
	if($delete)
	{
		$x='<script type="text/javascript">alert("you sucessfully Reject!");
		window.location=\'saved_complaintAccountpreventivepolice.php\';</script>';
		echo $x;
	}
	else
	{
		$x='<script type="text/javascript">alert("failed to reject!");
		window.location=\'saved_complaintAccountpreventivepolice.php\';</script>';
		echo $x;
	}
	}
	?>
     
    <?php
}
?>
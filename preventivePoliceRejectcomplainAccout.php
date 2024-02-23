<?php
include("connection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$select_status=mysql_query("select * from accountresponse where respons_id='$id'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->id;
	

	$delete=mysql_query("DELETE FROM  accountresponse WHERE respons_id='$id' ");
	if($delete)
	{
		header("Location:PreventivePoliceNotification.php");
	}
	else
	{
		echo "failed to reject Nomination !";
	}
	}
	?>
     
    <?php
}
?>
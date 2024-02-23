<?php
include("connection.php");
if(isset($_GET['id']))
{
	$noid=$_GET['id'];
	$select_status=mysql_query("select * from nomination where No_Id='$noid'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->noid;
	

	$delete=mysql_query("DELETE FROM  nomination WHERE No_Id='$noid' ");
	if($delete)
	{
		header("Location:saved_nominationpreventivepolice.php");
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
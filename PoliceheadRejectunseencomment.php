<?php
include("connection.php");
if(isset($_GET['Comment_id']))
{
	$Comment_id=$_GET['Comment_id'];
	$select_status=mysql_query("select * from comment where Comment_id='$Comment_id'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->Comment_id;
	

	$delete=mysql_query("DELETE FROM  comment WHERE Comment_id='$Comment_id' ");
	if($delete)
	{
		header("Location:PoliceHeadViewComment.php");
	}
	else
	{
		echo "failed to reject Comment !";
	}
	}
	?>
     
    <?php
}
?>
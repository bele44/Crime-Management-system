<?php
include("connection.php");
if(isset($_GET['Comment_id']))
{
	$Comment_id=$_GET['Comment_id'];
	$select_status=mysqli_query($con,"select * from comment where Comment_id='$Comment_id'");
	while($row=mysqli_fetch_object($select_status))
	{
		$st=$row->Comment_id;
	

	$delete=mysqli_query($con,"DELETE FROM  comment WHERE Comment_id='$Comment_id' ");
	if($delete)
	{
		header("Location:saved_comment.php");
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
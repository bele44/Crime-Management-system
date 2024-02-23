<?php
include("connection.php");
if(isset($_GET['placement_No']))
{
	$placement_No=$_GET['placement_No'];
	$select_status=mysql_query("select * from placement where placement_No='$placement_No'");
	while($row=mysql_fetch_object($select_status))
	{
		$st=$row->placement_No;
	$delete=mysql_query("DELETE FROM  placement WHERE placement_No='$placement_No' ");
	if($delete)
	{
		$x='<script type="text/javascript">alert(" Delete Succusfully!!");
			window.location=\'saved_Placementpreventivepolice.php\';</script>';
			echo $x;
	}
	else
	{
		$x='<script type="text/javascript">alert(" failed to reject placement !!");
			window.location=\'saved_Placementpreventivepolice.php\';</script>';
			echo $x;
	}
	}
	?>
     
    <?php
}
?>
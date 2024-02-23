<!DOCTYPE html>
<html>
<head>
</head>
<body>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<form action="" method="post">
<input type="text" name="searchkey" placeholder="Search" style="width:200px; height:40px;">
<input type="submit" name="search" value="Search" style="width:70px; height:40px;background-color:#8c98fd">
</form>
    <?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		$sql="select * from accused where accused_id='$searchkey'";
		$result=mysqli_query($sql,$con) ;
		If($result)
           {
           	?>
    <table border="0" bgcolor="#B6B6B4" id="resultTable">
	<tr bgcolor="#4863A0">
	<th> ID Number</th>
	<th>First Name</th> 
	<th>Father Name</th>
	<th>G.Father Name</th>
	<th>Sex</th>
	<th>Age</th>
	<th> Phone No</th>
	<th>City</th>
	<th>Kebele</th>
	<th>Village</th>
	<th>Date</th>
	<th>Photo</th>
	<th>Description</th>
	<th>Update</th></tr>
	</tr>
	
	<?php
	while($row = mysql_fetch_array($rs))
	{	
	$id=$row["accused_id"];					 
		//mysql_query("UPDATE applicant SET unread='yes'");
		?>
	<tr>
	<div class="post"  id="del<?php echo $id; ?>">
	<td><?php echo $row["accused_id"]; ?></td>
	<td><?php echo $row["firstname"]; ?></td>
	<td><?php echo $row["fathername"]; ?></td>
	<td><?php echo $row["gfathername"]; ?></td>
	<td><?php echo $row["sex"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td><?php echo $row["phoneno"]; ?></td>
	<td><?php echo $row["city"]; ?></td>
	<td><?php echo $row["kebele"]; ?></td>
	<td><?php echo $row["village"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
	<td><img src="<?php echo $row["photo"]; ?> height='20' width='30'"></td>
	<td><?php echo $row["description"]; ?></td>
	<td><?php echo '<a  href="preventivePoliceRejectNomination.php?id='.$row['accused_id'].'">Edit</a>';?></td>
	</div>
												
	<?php
	 }
   ?>
	</tr></table>
           	
           }
		}
</body>
</html>		
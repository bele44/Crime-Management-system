

<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Preventive Police page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
header("location:index.php");
else
{
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('d-m-Y');
$activity_type="View Report";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
?>
<div id="wrapper">

<table width="100%" cellspacing="0px">
<tr>
<td>  
<div id="header">
	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/nn.jpg" width="140px"height="160px">
<?php
require("header.php");
?>       <!--end of header -->
</div>
</td>
</tr>

<tr>
<td>
<div id="headermenu">

<?php
require("PreventivePoliceMenu.php");
echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
?>     
</div> 
</td>
</tr>
</table>	

<div id="maincontent">	   
<table width="100%"> 
<tr>


<td>
<div id="ContentLeft">
<?php
require("PreventivePoliceSideMenu.php");
?>
</div>	   
</td>
<td>

<div id="ContentCenter">
<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
<br>
<?php
if(!isset($_POST['search']))
{
?>
<fieldset style="width: 630px;height: 100px;margin: auto;border-top-right-radius: 10px;
border-top-left-radius: 10px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-top: 10px;">
<form action=" " method="post">
<table style="margin-top: 10px;">
<tr><td><font size="5px">  Select daily month or year Report:</font></td></tr>
<tr><td><input type="submit" value="View" name="search" style="background-color: #badcdb;width: 100px;height: 35px;">
<font size="5px"><select name="selecttime" style="width: 250px;height: 35px;">
<option selected="selected" value="">Select Time</option>
<option value="Daily">Daily</option>
<option value="Year">Year</option></font>
<option value="1">September</option>
<option value="2">October</option>
<option value="3">November</option>
<option value="4">December</option>
<option value="5">January</option>
<option value="6">February</option>
<option value="7">March</option>
<option value="8">April</option>
<option value="9">May</option>
<option value="10">June</option>
<option value="11">July</option>
<option value="12">August</option>
</select></td></tr>
</table>	
</form>	
</fieldset>
<?php
}
?>
<?php
if(isset($_POST['search']))
{$activity="Preventive police View report[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	
								
$selecttime=$_POST["selecttime"];
if($selecttime=='Daily')
{

$query2="select * from criminalcase where RecordedDate='".date("d-m-Y")."'";
$recordfound1=mysqli_query($con,$query2);
if($recordfound1)
{   $total=0;
$count="select * from criminalcase where crimelevel='Felony' and RecordedDate='".date("d-m-Y")."'";

$querycount=mysqli_query($con,$count);
$Felony = mysqli_num_rows($querycount);
$count2="select * from criminalcase where crimelevel='simplecrime' and RecordedDate='".date("d-m-Y")."'";
$querycount2=mysqli_query($con,$count2);
$simplecrime = mysqli_num_rows($querycount2);
$total=$Felony+$simplecrime;
?>
<?php
include("Print.php");
?>
<br>
<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
</tr>
<?php
while($row2=mysqli_fetch_assoc($recordfound1))
echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

?>	
<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
</table>
<br>
<?php
}
}	
//$coun11 = mysqli_num_rows($recordfound1);
//echo "Number of customers:- Female=".$coun11."<br>";
			else if($selecttime=='Year')
			{
				$Year="select * from criminalcase where year='".date("Y")."'";
					$excute=mysqli_query($con,$Year);
					if($excute)
					{   $total=0;
					$count="select * from criminalcase where crimelevel='Felony' and year='".date("Y")."'";

					$querycount=mysqli_query($con,$count);
					$Felony = mysqli_num_rows($querycount);
					$count2="select * from criminalcase where crimelevel='simplecrime' and year='".date("Y")."'";
					$querycount2=mysqli_query($con,$count2);
					$simplecrime = mysqli_num_rows($querycount2);
					$total=$Felony+$simplecrime;
					?>
					<?php
					include("Print.php");
					?>
					<br>
					<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
					<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th><th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
					</tr>
					<?php
					while($row2=mysqli_fetch_assoc($excute))
					echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
					<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

					?>	
					<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
					<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
					</table>
					<br>
					<?php
					}
			}
		else if($selecttime=='01')
		{
		$m1="select * from criminalcase where month='01'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='01'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='01'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		else 
	   {  
	        $x='<script type="text/javascript">alert("No criminal Record in this month!!");
			window.location=\'PreventivePoliceGenerateReport.php\';</script>';
			echo $x;
			
		}
		}
	else if($selecttime=='02')
	{
	$m1="select * from criminalcase where month='02'";
	$month1=mysqli_query($con,$m1);
	if($month1)
	{   $total=0;
	$count="select * from criminalcase where crimelevel='Felony' and month='02'";

	$querycount=mysqli_query($con,$count);
	$Felony = mysqli_num_rows($querycount);
	$count2="select * from criminalcase where crimelevel='simplecrime' and month='02'";
	$querycount2=mysqli_query($con,$count2);
	$simplecrime = mysqli_num_rows($querycount2);
	$total=$Felony+$simplecrime;
	?>
	<?php
	include("Print.php");
	?>
	<br>
	<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
	<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
	</tr>
	<?php
	while($row2=mysqli_fetch_assoc($con,$month1))
	echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
	<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

	?>	
	<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
	<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
	</table>
	<br>
	<?php
	}
	}
else if($selecttime=='03')
		{
		$m1="select * from criminalcase where month='03'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='03'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='03'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}
else if($selecttime=='04')
		{
		$m1="select * from criminalcase where month='04'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='04'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='04'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}
else if($selecttime=='05')
	{
	$m1="select * from criminalcase where month='05'";
	$month1=mysqli_query($con,$m1);
	if($month1)
	{   $total=0;
	$count="select * from criminalcase where crimelevel='Felony' and month='05'";

	$querycount=mysqli_query($con,$count);
	$Felony = mysqli_num_rows($querycount);
	$count2="select * from criminalcase where crimelevel='simplecrime' and month='05'";
	$querycount2=mysqli_query($con,$count2);
	$simplecrime = mysqli_num_rows($querycount2);
	$total=$Felony+$simplecrime;
	?>
	<?php
	include("Print.php");
	?>
	<br>
	<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
	<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
	</tr>
	<?php
	while($row2=mysqli_fetch_assoc($month1))
	echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
	<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

	?>	
	<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
	<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
	</table>
	<br>
	<?php
	}
	}
else if($selecttime=='06')
		{
		$m1="select * from criminalcase where month='06'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='06'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='06'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}
else if($selecttime=='07')
		{
		$m1="select * from criminalcase where month='07'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='07'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='07'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($con,$querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}	
else if($selecttime=='08')
		{
		$m1="select * from criminalcase where month='08'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='08'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='08'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}	
else if($selecttime=='09')
		{
		$m1="select * from criminalcase where month='09'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='09'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='09'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}	
else if($selecttime=='10')
		{
		$m1="select * from criminalcase where month='10'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='10'";

		$querycount=mysqli_query($count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='10'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}			
else if($selecttime=='11')
		{
		$m1="select * from criminalcase where month='11'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='11'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='11'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}			
else if($selecttime=='12')
		{
		$m1="select * from criminalcase where month='12'";
		$month1=mysqli_query($con,$m1);
		if($month1)
		{   $total=0;
		$count="select * from criminalcase where crimelevel='Felony' and month='12'";

		$querycount=mysqli_query($con,$count);
		$Felony = mysqli_num_rows($querycount);
		$count2="select * from criminalcase where crimelevel='simplecrime' and month='12'";
		$querycount2=mysqli_query($con,$count2);
		$simplecrime = mysqli_num_rows($querycount2);
		$total=$Felony+$simplecrime;
		?>
		<?php
		include("Print.php");
		?>
		<br>
		<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 70px;">
		<tr><th>Crime_Type</th>	<th>Crime_level</th><th>Crime Occured_Kebele</th>	<th>Village</th><th>Recorded_Date</th><th>Descrption</th>	
		</tr>
		<?php
		while($row2=mysqli_fetch_assoc($month1))
		echo "<tr> <td>". $row2["crimetype"]."</td><td>".$row2["crimelevel"]."</td><td>".$row2["kebele"]."</td>
		<td>". $row2["village"]."</td><td>". $row2["RecordedDate"]."</td><td>". $row2["description"]."</td></tr>";

		?>	
		<tr><td colspan="2">Felony crime=<?php echo $Felony;?></td><td colspan="2">Simple crime=<?php echo $simplecrime;?></td>
		<td colspan="2">Total crime=<?php echo $total;?></td></tr>	
		</table>
		<br>
		<?php
		}
		}		
else
{

}
}	
?>
</div>
</div>
</td>
<td>
<div id="ContentRight">
	<img src="images/p5.jpg" width="200px" height="200px">
<?php

?>	
</div>
</td>


</tr>
</table>
</div>	 	



<div id="footer">
<?php
require("footer.php");
?>
</div>

<!--end of main wrapper-->

</div>
<?php
}
?>
</body>
</html>

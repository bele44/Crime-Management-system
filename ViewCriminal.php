
<?php
session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>View Nomination page</title>
<link  href="css/cssforspacail.css" rel="stylesheet" type="text/css"/>
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
$activity_type="View criminal";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
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
				   if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							echo"<font color=pink size=5px>(welcome</font> <font color=yellow size=4px> $fullname )</font>";
								
							}
				   ?> 
				   </div>
      		  </div> 
		  </td>
		</tr>
	  </table>	
	       
         		<div id="maincontent">	   
         <table width="100%"> 
          <tr>
            	 <td><br>
             		 <div id="ContentLeft">
             		 
		   	   				 <?php
			    				require("PreventivePoliceSideMenu.php");
			    			  ?>
			  		 	   
				    </td>
				   <td>
					
		  <div id="ContentCenter" style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
		 
		<br><br>
		<div style="margin-left: 800px;width: 50px;height: 30px;margin-top: -70px;">
				   	<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=140px height=150px> <br>";
							}?>
			 </div>				
		<br>
		<form action="" method="post">
		<input type="submit" name="search" value="Search" style="width:70px; height:45px;background-color:#acf7f4;">
		<input type="text" name="searchkey" placeholder="Search by ID" style="width:200px; height:40px;">
		</form>
		<br>
		<?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		if($con)
		{
			$sql="select * from criminal where criminal_id='$searchkey'";
			 $recordfound=mysqli_query($con,$sql); 
			$activity="Preventive police View criminal recoreds[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
			if($row = mysqli_fetch_assoc($recordfound))
		{
			$criminalid=$row["criminal_id"];
			$sql1="select * from criminalcase where criminal_id='$criminalid' ";
		    $recordfound1=mysqli_query($con,$sql1);
				$firstname=$row["firstname"];
				$fathername=$row["fathername"];
		
			?>
			<?php
			 if($recordfound1)
		    {?>
			<table border='1' cellpadding="0" cellspacing="0">
			<h2>Criminal Name <font color="#44bb74;"> <?php echo" $firstname   $fathername "; ?><h2></tr>
			<tr><th>Crime_Type</th> <th>Crime_Level</th><th>Crime_Commited kebele</th><th>
				Crime_Commited village</th><th>Date</th><th>month</th><th>Year</th><th>Description</th><th>Photo</th></tr>	
			<?php
			while($row2=mysqli_fetch_assoc($recordfound1))
			{
				echo"<tr> <td>". $row2["crimetype"]."</td>
				 <td>". $row2["crimelevel"]."</td><td>". $row2["kebele"]."</td><td>". $row2["village"]."</td>
				<td>". $row2["date"]."</td><td>". $row2["month"]."</td><td>". $row2["year"]."</td><td>". $row2["description"]."</td>
				<td><img src=". $row2["photo"]." height='50' width='40'/></td></tr>";
			}
		}
			?>
			</table>
			<?php 
			}
			else{
				$x='<script type="text/javascript">alert("a person has not criminal Record");
				window.location=\'ViewCriminal.php\';</script>';
				echo $x;
			}
			
			?>
			<?php	
			}
		}
		?>
			<?php
	 if(!isset($_POST['search']))
		{
		?>
		
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">									
										
<a href="#"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1">Number of Criminal Record (&nbsp;<?php 
$count_item=mysqli_query($con,"select * from criminal " ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
<font size="3px">							
<br><br>
<?php
$sql = "select * from criminal ";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from criminal")
or die(mysqli_error());
								$count = mysqli_num_rows($query1);	
								if ($count != '0'){?>

<table border='1' cellpadding="0" cellspacing="0">
<tr>
 <th>criminal_id</th>
 <th>First_Name</th>
  <th>Father_Name</th>
  <th>G.Father_Name</th>
  <th>Sex &nbsp;</th>
  <th>Age</th>
  <th>Phone_No</th>
  <th>Village</th>
  <th>Kebele</th>
  <th>Education_level</th>
  <th>Photo</th>
  <th>Job</th>
  </tr>
        <?php
while($row = $rs->fetch_assoc())
{	
   $id=$row["criminal_id"]; 							 
	echo"<tr> <td>". $row["criminal_id"]."</td>
	<td>". $row["firstname"]."</td> 
	<td>". $row["fathername"]."</td>
	<td>". $row["gfathername"]."</td>
	<td>". $row["sex"]."</td>
	<td>". $row["age"]."</td>
	<td>". $row["phoneno"]."</td>
	<td>". $row["village"]."</td>
	<td>". $row["kebele"]."</td>
	<td>". $row["educationlevel"]."</td>
	<td><img src=". $row["photo"]." height='50' width='40'/></td>
	<td>". $row["job"]."</td></tr>";
}
	?>

	</table>
 <?php
    }
    ?>
	</div>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}?>
		</form>		
                               
                        <!-- /block -->
			                       	               
			              
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    		
				             		
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

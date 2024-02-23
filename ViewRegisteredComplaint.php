
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Block Complain page</title>
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
$activity_type="View Complaints";
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

            
                <img src="images/a.jpg" width="140px"height="160px">
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


	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">	
							
<?php
$query = mysqli_query($con,"select * from Registercomplaint where status='Active'");
$count = mysqli_num_rows($query);
?>		
										
<a href="ViewRegisteredComplaint.php"><i><font size="5px" color="#363ecf" style="text-decoration: none;"> Active Complaint (&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<?php 
$count_item=mysqli_query($con,"select * from Registercomplaint where status='Blocked'" );
$count=mysqli_num_rows($count_item);	
 ?>											
	<a href="ViewFinishedComplaint.php"><i><font size="5px" color="#87798c">Complaints finished thier case(&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>
<font size="3px">

<br>						
<?php
$sql = "select * from Registercomplaint where status='Active'";
	$activity="Preventive police view complaints[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')"); 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);								
$query1 = mysqli_query($con,"select * from Registercomplaint where status='Active' ")
or die(mysql_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0" id="resultTable">
<tr>
<th>Complaint_ID</th>
<th>Frist_Name</th>
<th>Father_Name</th>
<th>G.Father_Name</th>
<th>Sex</th>
<th>Age</th>
<th>Phone_No</th>
<th>Education level</th>
<th>Job</th>
<th>Work_place</th>
<th>Kebele</th>
<th>Email</th>
<th>photo</th>
<th>description</th>
<th colspan="2" align="center">Action</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["complaint_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["complaint_id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["gfathername"]; ?></td>
<td><?php echo $row["sex"]; ?></td>
<td><?php echo $row["age"]; ?></td>
<td><?php echo $row["phoneno"]; ?></td>
<td><?php echo $row["educationlevel"]; ?></td>
<td><?php echo $row["job"]; ?></td>
<td><?php echo $row["workplace"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["photo"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a  href="PreventivePoliceUpdateComplaint.php?complaint_id='.$row['complaint_id'].'">Edit</a>';?></td>
</div>
											
<?php
 }
	?>
	</tr></table>
	<br>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  complaint to be saved!</div>
								<?php } ?>
										
								</form>		
                               
                        <!-- /block -->
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


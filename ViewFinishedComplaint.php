
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
?>

<div id="wrapper">

      <table width="100%" cellspacing="0px">
        <tr>
           <td>  
             <div id="header">
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
				   ?>        <!--end of headermenu -->
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
$query = mysql_query("select * from Registercomplaint where status='Active'");
$count = mysql_num_rows($query);
?>		
										
<a href="ViewRegisteredComplaint.php"><i><font size="5px" color="#87798c" style="text-decoration: none;"> Active Complaint (&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<?php 
$count_item=mysql_query("select * from Registercomplaint where status='Blocked'" );
$count=mysql_num_rows($count_item);	
 ?>											
	<a href="ViewFinishedComplaint.php"><i><font size="5px" color="#363ecf">Complaints finished thier case(&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>
<font size="3px">

<br>						
<?php
$sql = "select * from Registercomplaint where status='Blocked'";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from Registercomplaint where status='Blocked' ")
or die(mysql_error());
	$count = mysql_num_rows($query1);	
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
while($row = mysql_fetch_array($rs))
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
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  Comment to be saved!</div>
								<?php } ?>
										
								</form>		
                               
                        <!-- /block -->
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=200px height=200px> <br>";
							echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px> $fullname </font>";
								
							}
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


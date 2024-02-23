
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Complain page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
$eid=$_SESSION['seid'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
?>

<div id="wrapper">

      <table width="100%" cellspacing="0px">
        <tr>
           <td>  
             <div id="header">
             	<img src="images/im.jpg" width="80px"height="160px">
             	 <img src="images/log.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/f.jpg" width="140px"height="160px">
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
			    <br>
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">	
							
<?php
$query = mysqli_query($con,"select * from complainrequest where status='seen'");
$count = mysqli_num_rows($query);
?>		
										
<a href="Preventivepolicesavedcomplain.php"><font size="5px" color="#363ecf" style="text-decoration: none;">Number of Complain request (&nbsp;<?php echo"<font color='#da240a'>".($count)."</font>"; ?>&nbsp;)</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
$queryt = mysqli_query($con,"select * from complainrequest where status='Responsed'");
$countt = mysqli_num_rows($queryt);
?>
<a href="Preventivepoliceresponsecomplain.php"><font size="5px" color="#363ecf" style="text-decoration: none;">Complaint get Responsed (&nbsp;<?php echo"<font color='#da240a'>".($countt)."</font>"; ?>&nbsp;)</font></a>
<br>
						
<?php
$sql = "select * from complainrequest where status='seen'";
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
//$query1 = mysqli_query("select * from complainrequest where status='seen' ")
//or die(mysql_error());
	$count = $rs->num_rows;	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0">
<tr>
<th>complint_id</th>
<th>firstname</th>
<th>fathername</th>
<th>Gfathername</th>
<th>Complaint type</th>
<th>Date</th>
<th>Status</th>
<th>Description</th>
<th colspan="2" align="center">Action</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["complaint_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["complaint_id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["gfathername"]; ?></td>
<td><?php echo $row["complaintype"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a href="PreventivepoliceResponcecomplain.php?complaint_id='.$row['complaint_id'].'">Send Response</a>';?></td>
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
			<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No Complain to be saved!</div>
			<?php } ?>
					
			</form>	
    <!-- /block -->
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
							echo"<img src=$photo width=200px height=200px> <br>";
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

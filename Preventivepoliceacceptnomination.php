
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
{$eid=$_SESSION['seid'];
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];

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
$query = mysqli_query($con,"select * from nominationmissingperson where status='accepted'");
$count = mysqli_num_rows($query);
?>		
										
<a href="Preventivepoliceacceptnomination.php"><font size="5px" color="#363ecf" style="text-decoration: none;"> Number of nomination Recorded (&nbsp;<?php echo"<font color='#da240a'>".($count)."</font>"; ?>&nbsp;)</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	

<br>						
<?php
$sql = "select * from nominationmissingperson where status='accepted'";
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	//$rs = $pager->paginate();		
	$result = $con->query($sql);							
$query1 = mysqli_query($con,"select * from nominationmissingperson where status='accepted' ")
or die(mysql_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0">
<tr>
<th>Police_Id</th>
<th>NMP_ID</th>
<th>MP_ID</th>
<th>Zone</th>
<th>Woreda</th>
<th>Kebele</th>
<th>Village</th>
<th>Date</th>
<th>Status</th>
<th>Description</th>
<th colspan="2" align="center">Action</th>
</tr>
        <?php
while($row = $result->fetch_assoc())
{	
$id=$row["NMP"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["status2"]; ?></td>
<td><?php echo $row["NMP"]; ?></td>
<td><?php echo $row["MP_ID"]; ?></td>
<td><?php echo $row["zone"]; ?></td>
<td><?php echo $row["woreda"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["village"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a  href="Preventivepoliceresponsenomination.php?NMP='.$row['NMP'].'">Send Response</a>';?></td>
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
			<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  Criminal is Lost!</div>
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
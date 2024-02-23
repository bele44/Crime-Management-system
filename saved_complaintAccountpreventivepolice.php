
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complain Account page</title>
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

                <img src="images/downloadf.jpg" width="140px"height="160px">
		    	 <?php
			      require("header.php");
			      echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
			     ?>       
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
										
<a href="saved_complaintAccountpreventivepolice.php"><font size="4px" color="#a04eb1" style="margin-left: 10px;">
Saved complaint Account(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from responsecomplaintaccount where status='acceptresponse' && police_id='$eid' " ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>
<font size="3px">							
									<?php
$query1 = mysqli_query($con,"select * from responsecomplaintaccount where status='acceptresponse' ORDER BY date DESC")
or die(mysqli_error());
?>

<?php
$sql = "select * from responsecomplaintaccount where status='acceptresponse' && police_id='$eid'  ORDER BY date DESC";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from responsecomplaintaccount where status='acceptresponse' && police_id='$eid'  ORDER BY date DESC")
or die(mysqli_error());
								$count = mysqli_num_rows($query1);	
								if ($count != '0'){?>
<br><br>
<table border="1" cellpadding="0"cellspacing="0" id="resultTable" style="margin-left: 10px;">
<tr>
<th>respons_id</th>
<th>Adminstrator_id</th> 
<th>police_id</th>
<th>Complaint username</th>
<th>Complaint password</th>
<th>date</th>
<!--<th>Action</th>-->
</tr>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["Response_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["Response_id"]; ?></td>
<td><?php echo $row["adminstrator_id"]; ?></td>
<td><?php echo $row["police_id"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["password"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<!--<td><?php echo '<a  href="PreventivepoliceRejectresponse.php?Response_id='.$row['Response_id'].'">Delete</a>';?></td>-->
</div>
											
<?php
 }
	?>
	</tr>
	</table>
	<br><br>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  record to be saved!</div>
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

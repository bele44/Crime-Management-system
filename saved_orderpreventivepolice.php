
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Order page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{	$eid=$_SESSION['seid'];
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
						<a href="saved_orderpreventivepolice.php"><font size="4px" color="#a04eb1">
						Accepted Order(&nbsp;<?php 
						$count_item=mysqli_query($con,"select * from orders where status='seen' && userid='$eid'" );
						$count=mysqli_num_rows($count_item);	
						echo"<font color='red'>".($count)."</font>"; ?>)</font></a>
						<font size="3px">							
						<?php
						$query1 = mysqli_query($con,"select * from orders where status='seen' && userid='$eid'")
						or die(mysqli_error());
						?>

						<?php
						$sql = "select * from orders where status='seen' && userid='$eid'";
							 
							//Create a PS_Pagination object
							//$pager = new PS_Pagination($con, $sql, 5, 8);
						 	//The paginate() function returns a mysql result set for the current page
							$rs = $con->query($sql);								
						$query1 = mysqli_query($con,"select * from orders where status='seen' && userid='$eid'")
						or die(mysqli_error());
							$count = mysqli_num_rows($query1);	
							if ($count != '0'){?>

						<table border="1" cellpadding="0"cellspacing="0">
						<tr>
						    <th>order_id</th>
							<th>accuser_id</th>
							<th>police id</th>
							<th>Accuser_fname</th>
							<th>Accuser_gfathername</th>
							<th>Accuser_kebele</th>
							<th>accused Firstname</th>
							<th>accused fathername</th>
							<th>accused G.fathername</th>
							<th> Sex</th><th>kebele</th>
							<th>Village</th>
							<th>Crime commited dates</th>
							<th>appointment dates</th>
							<th>Crime commited dates</th>
							<th>Crime_Type</th>
							<th>Crime_Level</th>
							<th>Description</th>
						</tr>
						        <?php
						while($row = $rs->fetch_assoc())
						{$id=$row["order_id"]; 							 
						$accuseid=$row["accuser_id"];   
						$query1=mysqli_query($con,"select * from accuser where accuser_id='$accuseid'");
						while($row2= mysqli_fetch_assoc($query1))
						{
						$afirstname=$row2["firstname"];
						$afathername=$row2["fathername"];
						$agfathername=$row2["gfathername"];	
						$kebele2=$row2["kebele"];
						}
							?>
						<tr>
						<td><?php echo $row["order_id"]; ?></td>
						<td><?php echo $row["accuser_id"]; ?></td>
						<td><?php echo $row["userid"]; ?></td>
						<td><?php echo $afirstname ?></td>
						<td><?php echo $afathername; ?></td>
						<td><?php echo $agfathername; ?></td>
						<td><?php echo $kebele2 ?></td>
						<td><?php echo $row["accused_firstname"]; ?></td>
						<td><?php echo $row["accused_fathername"]; ?></td>
						<td><?php echo $row["accused_gfathername"]; ?></td>
						<td><?php echo $row["sex"]; ?></td>
						<td><?php echo $row["kebele"]; ?></td>
						<td><?php echo $row["village"]; ?></td>
						<td><?php echo $row["Crime_commited_dates"]; ?></td>
						<td><?php echo $row["appointment_dates"]; ?></td>
						<td><?php echo $row["crimetype"]; ?></td>
						<td><?php echo $row["crimelevel"]; ?></td>
						<td><?php echo $row["description"]; ?></td>
						</div>
																	
						<?php
						 }
						?>
							</tr></table>
							<?php
								// echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
							}						
							else{ ?>
							<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No record to be saved!</div><?php } ?>
							</form>	
								
				<!-- /block -->
 					 </div>
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

<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer View accuser page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("DetectiveOfficermenu.php");
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
			    				require("DetectiveOfficerSidemenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			   			 <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">									
<?php
$query = mysqli_query($con,"select * from accuser ORDER BY date DESC")
or die(mysqli_error());
$coun = mysqli_num_rows($query);
?>		
										
<a href="ViewAccuser.php"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1">Number of Recored(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from accuser " ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='#da240a'>".($count)."</font>"; ?>)</font></i></a>
		<br>
	<font size="4px">							
	<?php
	$query1 = mysqli_query($con,"select * from accuser ORDER BY date DESC")
	or die(mysqli_error());
	?>

	<?php
	$sql = "select * from accuser ORDER BY date DESC";
		//Create a PS_Pagination object
		//$pager = new PS_Pagination($con, $sql, 5, 8);
	 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);								
	$query1 = mysqli_query($con,"select * from accuser ORDER BY date DESC")
	or die(mysqli_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0')
	{
	?>

	<table border="1" cellpadding="0"cellspacing="0">
	<tr>
	<th> ID Number</th>
	<th>First Name</th> 
	<th>Father Name</th>
	<th>G.Father Name</th>
	<th>Sex</th>
	<th>Age</th>
	<th> Phone No</th>
	<th>Education Level</th>
	<th>Email</th>
	<th>Kebele</th>
	<th>Village</th>
	<th>Date</th>
	<th>Photo</th>
	<th>Description</th>
	</tr>
	
	<?php
	while($row = $rs->fetch_assoc())
	{	
	$id=$row["accuser_id"];					 
		//mysql_query("UPDATE applicant SET unread='yes'");
		?>
	<tr>
	<div class="post"  id="del<?php echo $id; ?>">
	<td><?php echo $row["accuser_id"]; ?></td>
	<td><?php echo $row["firstname"]; ?></td>
	<td><?php echo $row["fathername"]; ?></td>
	<td><?php echo $row["gfathername"]; ?></td>
	<td><?php echo $row["sex"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td><?php echo $row["phoneno"]; ?></td>
	<td><?php echo $row["educationlevel"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["kebele"]; ?></td>
	<td><?php echo $row["village"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
	<td><img src="<?php echo $row["photo"]; ?> height='20' width='30'"></td>
	<td><?php echo $row["description"]; ?></td>
	</div>
												
	<?php
	 }
   ?>
	</tr></table>
		<?php
			//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
		}						
		else{ ?>
			<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  record to be saved!</div>
			<?php  
			}
	
		?>
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

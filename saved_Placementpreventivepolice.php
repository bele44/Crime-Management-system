
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Placement page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
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
$query = mysqli_query($con,"select * from placement where status='unseen' ORDER BY date DESC")
or die(mysqli_error());
$coun = mysqli_num_rows($query);
?>		
										
<a href="saved_Placementpreventivepolice.php"><font size="5px" color="#a04eb1" style="margin-left: 15px;">Saved placement(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from placement where status='Accepted'" ) or die(mysqli_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>
<font size="3px">							
	<br>	<br>								<?php
$query1 = mysqli_query($con,"select * from placement where status='Accepted' ORDER BY date DESC")
or die(mysqli_error());
?>

<?php
$sql = "select * from placement where status='Accepted' ORDER BY date DESC";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from placement where status='Accepted' ORDER BY date DESC")
or die(mysqli_error());
								$count = mysqli_num_rows($query1);	
								if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0" style="margin-left: 15px;">
<tr><th>placement_No</th><th>Police_id</th> <th>firstname</th><th>fathername</th><th>gfathername</th>
				<th>sex</th><th> phoneno</th><th>kebele</th><th>date</th></tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["placement_No"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
	<td><?php echo $row["placement_No"]; ?></td>
	<td><?php echo $row["Police_id"]; ?></td>
	<td><?php echo $row["firstname"]; ?></td>
	<td><?php echo $row["fathername"]; ?></td>
	<td><?php echo $row["gfathername"]; ?></td>
	<td><?php echo $row["sex"]; ?></td>
	<td><?php echo $row["phoneno"]; ?></td>
	<td><?php echo $row["kebele"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
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

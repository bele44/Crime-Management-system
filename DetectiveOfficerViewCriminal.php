<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer View Criminal page</title>
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
			    <br>
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">									
<?php
$query = mysqli_query($con,"select * from criminalcase where crimelevel='Felony' ORDER BY date DESC")
or die(mysqli_error());
$coun = mysqli_num_rows($query);
?>		
										
<a href="DetectiveOfficerViewCriminal.php"><font size="5px" color="#3469d8;">Number of Felony crime Recorded(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from criminalcase where crimelevel='Felony'" );
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>
<font size="3px">							
									<?php
$query1 = mysqli_query($con,"select * from criminalcase where crimelevel='Felony' ORDER BY date DESC")
or die(mysql_error());
?>

<?php
$sql = "select * from criminalcase where crimelevel='Felony' ORDER BY date DESC";
	 
	//Create a PS_Pagination object
//	$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);								
$query1 = mysqli_query($con,"select * from criminalcase where crimelevel='Felony' ORDER BY date DESC")
or die(mysql_error());
								$count = mysqli_num_rows($query1);	
								if ($count != '0'){?>
<br><br>
<table border='1' cellpadding="0" cellspacing="0" id="resultTable">
<tr>
<th>criminalcase_id</th>
<th>criminal_id</th> 
<th>crimetype</th>
<th>crimelevel</th>
<th>kebele</th>
<th>village</th>
<th> RecordedDate</th>
<th>commeted date</th>
<th>month</th>
<th> year</th>
<th>description</th>
<th> photo</th>
<th> Action</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["criminalcase_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["criminalcase_id"]; ?></td>
<td><?php echo $row["criminal_id"]; ?></td>
<td><?php echo $row["crimetype"]; ?></td>
<td><?php echo $row["crimelevel"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["village"]; ?></td>
<td><?php echo $row["RecordedDate"]; ?></td>
<td><?php echo $row["date"]; ?></td>

<td><?php echo $row["month"]; ?></td>
<td><?php echo $row["year"]; ?></td>
<td><?php echo $row["description"];?></td>
<td><img src=<?php echo $row["photo"]; ?> height='50' width='40'></td>
<td><?php echo '<a  href="Detectiveofficerviewcriminallist.php?id='.$row['criminal_id'].'">See criminal</a>';?></td>

</div>
											
<?php
 }
	?>
	</tr></table>
	<br><br>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
	<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No crime</div>
	<?php } ?>
	</form>		</div>
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

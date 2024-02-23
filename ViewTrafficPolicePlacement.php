<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Traffic Officer page</title>
<link  href="css/trafficofficermystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("TrafficOfficeMenu.php");
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
              			<h1>Side Link</h1>
		   	   				 <?php
			    				require("TrafficOfficeSideMenu.php");
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
$query = mysql_query("select * from trafficplacement where status='unseen'")
or die(mysql_error());
$coun = mysql_num_rows($query);
?>		
										
<a href="ViewTrafficPolicePlacement.php">Number Of Recored(&nbsp;<?php 
$count_item=mysql_query("select * from trafficplacement where status='seen'" ) or die(mysql_error());
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
<font size="3px">							
									<?php
$query1 = mysql_query("select * from trafficplacement where status='seen' ")
or die(mysql_error());
?>

<?php
$sql = "select * from trafficplacement where status='seen'";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from trafficplacement where status='seen'")
or die(mysql_error());
								$count = mysql_num_rows($query1);	
								if ($count != '0'){?>

<table border="1" cellpadding="0"cellspacing="0">
<tr>
<th>Trafficpolice Id</th>
<th>First_Name</th> 
<th>Father_Name</th>
<th>G.Father_Name</th>
<th>Sex</th>
<th>Phone_No</th>
<th>kebele</th>
<th>Street</th>
<th> Start__date</th>
<th>End___date</th>
<th>Update</th></tr>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["Trafficpolice_id"]; 							 
	//mysql_query("UPDATE applicant SET status='unseen'");
	?>
<tr>
<td><?php echo $row["Trafficpolice_id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["gfathername"]; ?></td>
<td><?php echo $row["sex"]; ?></td>
<td><?php echo $row["phoneno"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["street"]; ?></td>
<td><?php echo $row["start_date"]; ?></td>
<td><?php echo $row["end_date"]; ?></td>
<td><?php echo '<a  href="preventivePoliceRejectNomination.php?id='.$row['Trafficpolice_id'].'">Edit</a>';?></td>

											
<?php
 }
	?>
	</tr></table>
	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
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
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=210px height=200px> <br>";
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
